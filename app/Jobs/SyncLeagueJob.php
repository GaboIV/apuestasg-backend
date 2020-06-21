<?php

namespace App\Jobs;

use App\Game;
use App\Team;
use App\BetType;
use App\Competitor;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncLeagueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;
    public $league;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($league)
    {
        $this->league = $league; 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $league = $this->league;

        if ($league->name_uk) {
            foreach ($league->name_uk as $key => $sync_id) {
                $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
                    'Content-Type' => 'text/plain'
                ]]);
    
                $url = 'https://sports.tipico.de/json/program/selectedEvents/all/' . $sync_id . "/";
    
                $data = json_decode($client->request('GET', $url)->getBody());
    
                $key_sport = key($data->availableMarkets);                

                if (isset($data->programData->$key_sport[0])) {
                    $games = $data->programData->$key_sport[0]->lobbyEvents;
    
                    $bet_types = $data->availableMarkets->$key_sport;
        
                    foreach ($bet_types as $key => $bt) {
                        $importance = 100;
        
                        $bet_type = BetType::UpdateOrCreate([
                            "name" => $bt,
                            "category_id" => $league->category_id
                        ],[
                            "importance" => $importance
                        ]);
        
                        $importance--;
                    }
        
                    foreach ($games as $key => $game) {
                        $teams = [];
                        $teams_id = [];
        
                        for ($i=1; isset($game->match->{"team" . $i}); $i++) { 
                            $teams[$i] = Team::firstOrCreate([
                                "name_id" => $game->match->{"team" . $i}
                            ],[
                                "web_id" => $game->match->{"team" . $i . "Id"},
                                "name" => $game->match->{"team" . $i},
                                "name_id" => $game->match->{"team" . $i}
                            ]);
        
                            $teams_id[] = $teams[$i]->id;
        
                            $teams[$i]->leagues()->syncWithoutDetaching($league->id);
                        }
        
                        $match = Game::updateOrCreate([
                            "web_id" => $game->match->id,
                            "league_id" => $league->id,
                        ],[
                            "start" => date('Y-m-d H:i:s', ($game->match->numericDate / 1000)),
                            "description" => $game->match->text,
                            "teams_id" => (array) $teams_id,
                        ]);
        
                        foreach ($game->resultSet3s as $key => $option_type) {
                            $bet_type = BetType::whereName($option_type->type)->first();
        
                            $ht = null;
        
                            if (strpos($bet_type->name, 'section-') !== false) {
                                if (strpos($option_type->name, '1.') !== false) {
                                    $ht = 1;
                                } elseif (strpos($option_type->name, '2.') !== false) {
                                    $ht = 2;
                                } else {
                                    $ht = null;
                                }
                            } else {
                                $ht = null;
                            }
                                
                            Competitor::updateOrCreate([
                                "game_id" => $match->id,
                                "code" => $option_type->fixedParamText,
                                "bet_type_id" => $bet_type->id,
                                "HT" => $ht
                            ],[
                                "data" => $option_type->results,
                                "provider" => "tipico"
                            ]);                    
                        }
                    }
                }
            }                
        }

        return true;
    }
}

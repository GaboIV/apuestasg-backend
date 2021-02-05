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

        \Log::info("Start sync for league: " . $league->name);

        if ($league->name_uk) {
            foreach ($league->name_uk as $key => $sync_id) {
                $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
                    'Content-Type' => 'text/plain'
                ]]);
    
                $url = 'https://sports.tipico.de/json/program/selectedEvents/all/' . $sync_id . "/?apiVersion=1";
    
                $data = json_decode($client->request('GET', $url)->getBody())->SELECTION ?? null;
    
                $key_sport = key($data->availableMarkets);

                if (isset($data->sports) && count($data->sports) > 0 && $key_sport == $data->sports[0]->sportId) {

                    $games = $data->events;
    
                    $bet_types = $data->availableMarkets->$key_sport;
        
                    foreach ($bet_types as $key => $bt) {
                        $importance = 50;
        
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
        
                        for ($i=1; isset($game->{"team" . $i}); $i++) { 
                            if ($game->{"team" . $i . "Id"} == 0) {
                                $teams[$i] = Team::firstOrCreate([
                                    "name_id" => $game->{"team" . $i}
                                ],[
                                    "web_id" => $game->{"team" . $i . "Id"},
                                    "name" => $game->{"team" . $i},
                                    "name_id" => $game->{"team" . $i}
                                ]);
                            } else {
                                $teams[$i] = Team::firstOrCreate([
                                    "web_id" => $game->{"team" . $i . "Id"},
                                ],[
                                    "web_id" => $game->{"team" . $i . "Id"},
                                    "name" => $game->{"team" . $i},
                                    "name_id" => $game->{"team" . $i}
                                ]);
                            }

                            $teams_id[] = $teams[$i]->id;
        
                            $teams[$i]->leagues()->syncWithoutDetaching($league->id);
                        }
        
                        $match = Game::updateOrCreate([
                            "web_id" => $game->id,
                            "league_id" => $league->id,
                        ],[
                            "start" => date('Y-m-d H:i:s', ($game->eventStartTime / 1000)),
                            "description" => $game->eventInfo,
                            "teams_id" => (array) $teams_id,
                        ]);

                        if (is_null($match->result)) {
                            foreach ($data->matchOddGroups->{$game->id} as $key => $option_type) {

                                $bet_type = BetType::whereName($key)->first();
            
                                $ht = null;
            
                                if (strpos($bet_type->name, 'section-') !== false) {
                                    if (strpos($key, '1.') !== false) {
                                        $ht = 1;
                                    } elseif (strpos($key, '2.') !== false) {
                                        $ht = 2;
                                    } else {
                                        $ht = null;
                                    }
                                } else {
                                    $ht = null;
                                }

                                foreach ($option_type as $key => $option) {
                                    Competitor::updateOrCreate([
                                        "game_id" => $match->id,
                                        "code" => $option->fixedParamText,
                                        "bet_type_id" => $bet_type->id,
                                        "HT" => $ht
                                    ],[
                                        "data" => $option->results,
                                        "provider" => "tipico"
                                    ]); 
                                }                                             
                            }
                        }
                    }
                }
            }                
        }

        \Log::info("Sincronizada la liga: " . $league->name);

        return true;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Team;
use App\League;
use App\BetType;
use App\Country;
use App\Category;
use App\Competitor;
use App\Helpers\Functions;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LeagueController extends ApiController
{
    public function sync($id) {
        $league = League::whereId($id)->first();

        if ($league->name_uk) {
            $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
                'Content-Type' => 'text/plain'
            ]]);

            $url = 'https://sports.tipico.de/json/program/selectedEvents/all/' . $league->name_uk . "/";

            $data = json_decode($client->request('GET', $url)->getBody());

            $key_sport = key($data->availableMarkets);

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
                        "web_id" => $game->match->{"team" . $i . "Id"}
                    ],[
                        "name" => $game->match->{"team" . $i},
                        "name_id" => $game->match->{"team" . $i},
                        "country_id" => $league->country_id
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
                
            return $this->successResponse($data->availableMarkets->$key_sport, 200);
        }
    }
}

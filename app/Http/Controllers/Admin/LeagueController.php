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
use App\Jobs\SyncLeagueJob;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LeagueController extends ApiController
{
    public function sync($id) {
        $league = League::whereId($id)->first();

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

        return $this->successResponse(true, 200);
    }

    public function syncLeagues48() {
        $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
            'Content-Type' => 'text/plain'
        ]]);

        $url = 'https://sports.tipico.de/json/program/navigationTree/48hrs';

        $data = json_decode($client->request('GET', $url)->getBody());

        foreach ($data->children as $key => $category) {
            $category_ids[] = $category->icon;

            $category_db = Category::whereNameId($category->icon)->first();

            if ($category)
                $categories[] = $category_db;

            foreach ($category->children as $key => $country) {
                foreach ($country->children as $key => $league) {
                    $leagues[] = (int) $league->groupId;
                }
            }

            $query_league = League::orderBy('name');

            foreach( $leagues as $league_item) {
                // $query_league->orWhereRaw("JSON_CONTAINS(name_uk, ?)", $league_item);

                $query_league->orWhere('name_uk', 'like', '%'.$league_item.'%');
            }

            $leagues_db = $query_league->get();

            foreach ($leagues_db as $key => $league_job) {
                $job_league = new SyncLeagueJob($league_job);
                dispatch($job_league);
            }

            $leagues_db = [];
            $leagues = [];
        }

        return $this->successResponse($leagues_db ?? [], 200);        
    }

    public function attachNameUk(Request $request, $id) {
        $data = $request->all();

        $league = League::whereId($id)->first();

        if (isset($league->name_uk)) {
            if (! in_array($data['name_uk'], $league->name_uk)){
                $arrays_name_uk = array_merge($league->name_uk, [$data['name_uk']]);
    
                $league->update([
                    "name_uk" => $arrays_name_uk
                ]);
            }    
        } else {
        	$league->update([
                "name_uk" => [$data['name_uk']]
            ]);
        }         

        return $this->successResponse([
            'league' => $league
        ], 200);
    }

    public function dettachNameUk(Request $request, $id) {
        $data = $request->all();

        $league = League::whereId($id)->first();

        if (in_array($data['name_uk'], $league->name_uk)){
            $arr = array_filter($league->name_uk, function($v) use ($data) {
                return $v != $data['name_uk'];
            });

            $league->update([
                "name_uk" => $arr
            ]);
        }        

        return $this->successResponse([
            'league' => $league
        ], 200);
    }
}

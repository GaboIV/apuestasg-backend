<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Team;
use App\League;
use App\Ticket;
use App\Player;
use App\Result;
use App\Pitcher;
use App\BetType;
use App\Selection;
use App\Competitor;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class GameController extends ApiController
{
    public function index() 
    {
        $games = Game::orderBy('start', 'desc')
                     ->with(["competitors.bet_type"])
                     ->with(["league" => function($q) {
                            $q->with('category');
                        }])
                     ->paginate(30);

        return $this->successResponse([
            'games' => $games
        ], 200);
    }

    public function indexByLeague($id) 
    {
        $games = Game::where('start', '>=', date("Y-m-d H:i:s"))
                 ->with('competitors.bet_type', 'league', 'teams.country')
                 ->whereLeagueId($id)
                 ->orderBy('start', 'asc')  
                 ->limit(20)
                 ->get();

        return $this->successResponse([
            'games' => $games
        ], 200);
    }

    public function one($id) 
    {
        $game = Game::whereId($id)
                     ->with(["competitors" => function($q) {
                            $q->with('team');
                        }])
                     ->with(["league" => function($q) {
                            $q->with('category');
                            $q->with('country');
                        }])
                     ->first();

        return $this->successResponse([
            'game' => $game
        ], 200);
    }

    public function updateOutstanding($id, Request $request) 
    {
        if ($request->has('outstanding')) {
            $game = Game::find($id);

            $game->outstanding = $request->outstanding;

            $game->save();
        }

        return $this->successResponse([
            'games' => $game
        ], 200);
    }

    public function store(Request $request) 
    {
        $data = $request->all();

        $bet_type = BetType::whereName('standard')->first();
        $league = League::whereId($data['league_id'])->first();

        foreach ($data['teams'] as $key => $team) {
        	$team = Team::firstOrCreate([
        		"name" => $team
        	],[
        		"country_id" => $league->country_id
        	]);

        	$team->leagues()->syncWithoutDetaching($league->id);

        	$teams[] = $team;
        	$teams_id[] = $team->id;

        	$odd_explode = explode("/", $data['odds'][$key]);

        	$data_game[] = [
		    	"id" => null,
		    	"caption" => $key + 1,
		    	"quoteFloatValue" => (($odd_explode[0] / $odd_explode[1]) + 1)
		    ];
        }

        $match = Game::updateOrCreate([
	        "league_id" => $league->id,
	        "start" => $data['start'],
	        "teams_id" => $teams_id
	    ]);

        Competitor::updateOrCreate([
            "game_id" => $match->id,
            "code" => "",
            "bet_type_id" => $bet_type->id,
            "HT" => ""
        ],[
            "data" => $data_game,
            "provider" => "apuestasg"
        ]);

        return $this->successResponse([
            'game' => $match
        ], 200);

        // if ($data['category_id']) {
            

        //     if ($data['league_id']) {
        //         if ($data['start']) {
        //             if ($data['teams'][0]) {
        //                 $team1 = Team::whereName($data['teams'][0])->first();

        //                 if (!$team1) {
        //                     $datateam1['name'] = $data['teams'][0];
        //                     $datateam1['name_uk'] = $data['teams'][0];
        //                     $team1 = Team::create($datateam1);
        //                     $team1->leagues()->attach($data['league_id']);
        //                 } else {
        //                     $team_league = $team1::whereHas('leagues', function ($query) use ($data) {
        //                         $query->where('league_id', $data['league_id']);
        //                     })
        //                     ->first();

        //                     if (!$team_league)
        //                         $team1->leagues()->attach($data['league_id']);
        //                 }

        //                 if ($data['teams'][1]) {
        //                     $team2 = Team::whereName($data['teams'][1])->first();
                            
        //                     if (!$team2) {
        //                         $datateam2['name'] = $data['teams'][1];
        //                         $datateam2['name_uk'] = $data['teams'][1];
        //                         $team2 = Team::create($datateam2);
        //                         $team2->leagues()->attach($data['league_id']);
        //                     } else {
        //                         if ($team2->name_uk == "Draw") {
        //                             $team_league = $team2::whereHas('leagues', function ($query) use ($data) {
        //                                 $query->where('league_id', $data['league_id']);
        //                             })
        //                             ->first();

        //                             if (!$team_league)
        //                                 $team2->leagues()->attach($data['league_id']);
        //                         }
        //                     }

        //                     if ($data['descripcion'][0] != '') {
        //                         if ($data['descripcion'][1] != '') {
        //                             if (isset($data['teams'][2])) {
        //                                 if ($data['descripcion'][0] != '') {
        //                                     $team3 = Team::whereName($data['teams'][2])->first();

        //                                     if (!$team3) {
        //                                         $datateam3['name'] = $data['teams'][2];
        //                                         $datateam3['name_uk'] = $data['teams'][2];
        //                                         $team3 = Team::create($datateam3);
        //                                         $team3->leagues()->attach($data['league_id']);
        //                                     } else {
        //                                         $team_league = $team3::whereHas('leagues', function ($query) use ($data) {
        //                                             $query->where('league_id', $data['league_id']);
        //                                         })
        //                                         ->first();

        //                                         if (!$team_league)
        //                                             $team3->leagues()->attach($data['league_id']);
        //                                     }
        //                                 } else {
        //                                     $mensaje = "Escriba un dividendo 3 válido";
        //                                 }
        //                             }

        //                             if ($mensaje == '') {
        //                                 $fecha = date("Y-m-d", strtotime($data['start']));
        //                                 $hora = date("H:i:s", strtotime($data['start']));

        //                                 if ( isset($data['descripcion'][2]) ){
        //                                     $id_wihi_partido = $fecha.'!'.$team1->id.'.'.$team3->id.'!'.$hora;
        //                                 } else {
        //                                     $id_wihi_partido = $fecha.'!'.$team1->id.'.'.$team2->id.'!'.$hora;
        //                                 }

        //                                 $data['web_id'] = $id_wihi_partido;

        //                                 $partido = Game::whereWebId($id_wihi_partido)->first();

        //                                 if ($partido) {
        //                                     $mensaje = "Este partido ya se encuentra registrado";
        //                                     $estatus = "existe";
        //                                 } else {
        //                                     $game = Game::create($data);

        //                                     if ($game) {
        //                                         $id_wihi_part1 = $team1->id.'!'.$game->id.'!'.$bettype->id;
        //                                         $id_wihi_part2 = $team2->id.'!'.$game->id.'!'.$bettype->id;

        //                                          if (isset($data['descripcion'][2])) {
        //                                             $id_wihi_part3 = $team3->id.'!'.$game->id.'!'.$bettype->id;
        //                                         }

        //                                         $competitor1 = Competitor::insert([
        //                                             'code' => $id_wihi_part1,
        //                                             'game_id' => $game->id,
        //                                             'team_id' => $team1->id,
        //                                             'provider' => 'apuestasg.com',
        //                                             'bet_type_id' => $bettype->id,
        //                                             'odd' => $data['descripcion'][0],
        //                                             'link' => '1'
        //                                         ]);

        //                                         if($competitor1){
        //                                             $competitor2 = Competitor::insert([
        //                                                 'code' => $id_wihi_part2,
        //                                                 'game_id' => $game->id,
        //                                                 'team_id' => $team2->id,
        //                                                 'provider' => 'apuestasg.com',
        //                                                 'bet_type_id' => $bettype->id,
        //                                                 'odd' => $data['descripcion'][1],
        //                                                 'link' => '1'
        //                                             ]);

        //                                             if($competitor2){
        //                                                 if (isset($data['descripcion'][2]) && isset($data['teams'][2])) {
        //                                                     $competitor3 = Competitor::insert([
        //                                                         'code' => $id_wihi_part3,
        //                                                         'game_id' => $game->id,
        //                                                         'team_id' => $team3->id,
        //                                                         'provider' => 'apuestasg.com',
        //                                                         'bet_type_id' => $bettype->id,
        //                                                         'odd' => $data['descripcion'][2],
        //                                                         'link' => '1'
        //                                                     ]);
        //                                                 }

        //                                                 $mensaje = "Se creó el partido correctamente";
        //                                                 $estatus = "correcto";
        //                                             }
        //                                         }
        //                                     }
        //                                 }
        //                             }
        //                         } else {
        //                             $mensaje = "Escriba un dividendo 2 válido";
        //                         }
        //                     } else {
        //                         $mensaje = "Escriba un dividendo 1 válido";
        //                     }
        //                 } else {
        //                     $mensaje = 'Escriba un equipo 2 válido';
        //                 }
        //             } else {
        //                 $mensaje = 'Escriba un equipo 1 válido';
        //             }
        //         } else {
        //             $mensaje = 'Escriba una fecha válida para el partido';
        //         }
        //     } else {
        //         $mensaje = 'Seleccione una liga válida';
        //     }
        // } else {
        //     $mensaje = 'Seleccione un deporte válido';
        // }

        // $result = array(
        //     "status" => $estatus,
        //     "mensaje" => $mensaje,
        //     "id_categoria" => $data['category_id'],
        //     "id_liga" => $data['league_id'],
        //     "fecha_inicio" => $data['start'],
        //     "id_wihi_partido" => $data['web_id'],
        //     "equipos" => $data['teams'],
        //     "tipo_apuesta" => $bettype,
        //     "dividendos" => $data['descripcion']
        // );

        
    }

    public function show($id) 
    {
    }

    public function update(Request $request, $id) 
    {
        $pitchers = $request->pitchers;
        $partido = $request->partido;

        $url = addslashes($partido['url']);
        $fecha_pdo = $partido['start'];
        $id_partido = $partido['id'];

        $i = 0;

        $equipos = $partido['competitors'];

        foreach ($pitchers as $ptc) {
            if (isset($ptc['nombre'])) {
                $nombre = $ptc['nombre'];
                $era = $ptc['era'];

                $id_equipo = $equipos[$i]['team']['id'];
                $id_participante = $equipos[$i]['id'];

                if ($nombre != '') {
                    $pitcher = Pitcher::whereName($nombre)->whereTeamId($id_equipo)->first();

                    if (!$pitcher)
                        $pitcher = Pitcher::create($ptc);

                    Competitor::whereId($id_participante)->update(['fact' => $pitcher->id]);

                    $sta_p1 = "success";                
                } else {
                    $sta_p1 = "success";
                } 
            }
               
            $i++;  
        }

        Game::whereId($id_partido)->update([
            "url" => $url,
            "start" => $fecha_pdo
        ]);

        foreach ($equipos as $compa) {
            $id_participante = $compa['id'];
            $dividendo = $compa['odd'];

            if ($id_participante != '' AND $dividendo != '') {
                Competitor::whereId($id_participante)->update([
                    "odd" => $dividendo
                ]);

                $sta_p1 = "success";                
            }
        }          

        if ($sta_p1 == "success") {
            $result = array(
                "status" => $sta_p1,
                "partido" => $partido,
                "pitchers" => $pitchers
            );
        } else {
            $result = array(
                "status" => 'error'
            );
        }       

        return $this->successResponse($result, 200);        
    }

    public function destroy($id) 
    {
    }

    public function byFilters(Request $request) 
    {
        $data = $request->all();

        $query = Game::with('league.category')->with('competitors');

        if (isset($data['category_id']) || isset($data['country_id'])) {
            $query->whereHas('league', function ($queryL) use ($data) {
            	if (isset($data['category_id']) && $data['category_id'] != 0) 
			    	$queryL->where('category_id', '=', $data['category_id']);
			    if (isset($data['country_id']) && $data['country_id'] != 0) 
			    	$queryL->where('country_id', '=', $data['country_id']);
			});
        }

        if (isset($data['start']) && $data['start'] != 0) {
            if ($data['date_greater_than']) {
                $query->where('start', '>=', $data['start'] . " 00:00:01");
            } else {
                $query->where('start', '>=', $data['start'] . " 00:00:01");
                $query->where('start', '<=', $data['start'] . " 23:59:59");
            }
        }

        if (isset($data['name']) && $data['name'] != '' && $data['name'] != 'todos' && $data['name'] != 'todas') {
        	$query->whereHas('teams', function ($queryC) use ($data) {
            	$queryC->Where('name', 'LIKE', "%" . $data['name'] . "%");
                $queryC->orWhere('name_id', 'LIKE', "%" . $data['name'] . "%");
			});
        }

        $games = $query->orderBy('start', 'asc')->paginate(50);

        return $this->successResponse([
            'games' => $games
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\BetType;
use App\Player;
use App\Competitor;
use App\Ticket;
use App\Selection;
use App\Result;
use App\Game;
use App\Http\Controllers\ApiController;
use App\League;
use App\Team;
use Illuminate\Http\Request;

class GameController extends ApiController
{
    public function index() {
        $games = Game::orderBy('start', 'desc')
                     ->with(["competitors" => function($q) {
                            $q->with('team');
                        }])
                     ->with(["league" => function($q) {
                            $q->with('category');
                        }])
                     ->paginate(30);

        return $this->successResponse([
            'games' => $games
        ], 200);
    }

    public function updateOutstanding($id, Request $request) {
        if ($request->has('outstanding')) {
            $game = Game::find($id);

            $game->outstanding = $request->outstanding;

            $game->save();
        }

        return $this->successResponse([
            'games' => $game
        ], 200);
    }

    public function store(Request $request) {
        $data = $request->all();

        $league = new League(['id' => $data['league_id']]);
        $mensaje = '';
        $estatus = 'error';

        if ($data['category_id']) {
            $bettype = BetType::whereCategoryId($data['category_id'])->first();

            if ($data['league_id']) {
                if ($data['start']) {
                    if ($data['teams'][0]) {
                        $team1 = Team::whereName($data['teams'][0])->first();

                        if (!$team1) {
                            $datateam1['name'] = $data['teams'][0];
                            $datateam1['name_uk'] = $data['teams'][0];
                            $team1 = Team::create($datateam1);
                            $team1->leagues()->attach($data['league_id']);
                        } else {
                            $team_league = $team1::whereHas('leagues', function ($query) use ($data) {
                                $query->where('league_id', $data['league_id']);
                            })
                            ->first();

                            if (!$team_league)
                                $team1->leagues()->attach($data['league_id']);
                        }

                        if ($data['teams'][1]) {
                            $team2 = Team::whereName($data['teams'][1])->first();
                            
                            if (!$team2) {
                                $datateam2['name'] = $data['teams'][1];
                                $datateam2['name_uk'] = $data['teams'][1];
                                $team2 = Team::create($datateam2);
                                $team2->leagues()->attach($data['league_id']);
                            } else {
                                if ($team2->name_uk == "Draw") {
                                    $team_league = $team2::whereHas('leagues', function ($query) use ($data) {
                                        $query->where('league_id', $data['league_id']);
                                    })
                                    ->first();

                                    if (!$team_league)
                                        $team2->leagues()->attach($data['league_id']);
                                }
                            }

                            if ($data['descripcion'][0] != '') {
                                if ($data['descripcion'][1] != '') {
                                    if (isset($data['teams'][2])) {
                                        if ($data['descripcion'][0] != '') {
                                            $team3 = Team::whereName($data['teams'][2])->first();

                                            if (!$team3) {
                                                $datateam3['name'] = $data['teams'][2];
                                                $datateam3['name_uk'] = $data['teams'][2];
                                                $team3 = Team::create($datateam3);
                                                $team3->leagues()->attach($data['league_id']);
                                            } else {
                                                $team_league = $team3::whereHas('leagues', function ($query) use ($data) {
                                                    $query->where('league_id', $data['league_id']);
                                                })
                                                ->first();

                                                if (!$team_league)
                                                    $team3->leagues()->attach($data['league_id']);
                                            }
                                        } else {
                                            $mensaje = "Escriba un dividendo 3 válido";
                                        }
                                    }

                                    if ($mensaje == '') {
                                        $fecha = date("Y-m-d", strtotime($data['start']));
                                        $hora = date("H:i:s", strtotime($data['start']));

                                        if ( isset($data['descripcion'][2]) ){
                                            $id_wihi_partido = $fecha.'!'.$team1->id.'.'.$team3->id.'!'.$hora;
                                        } else {
                                            $id_wihi_partido = $fecha.'!'.$team1->id.'.'.$team2->id.'!'.$hora;
                                        }

                                        $data['web_id'] = $id_wihi_partido;

                                        $partido = Game::whereWebId($id_wihi_partido)->first();

                                        if ($partido) {
                                            $mensaje = "Este partido ya se encuentra registrado";
                                            $estatus = "existe";
                                        } else {
                                            $game = Game::create($data);

                                            if ($game) {
                                                $id_wihi_part1 = $team1->id.'!'.$game->id.'!'.$bettype->id;
                                                $id_wihi_part2 = $team2->id.'!'.$game->id.'!'.$bettype->id;

                                                 if (isset($data['descripcion'][2])) {
                                                    $id_wihi_part3 = $team3->id.'!'.$game->id.'!'.$bettype->id;
                                                }

                                                $competitor1 = Competitor::insert([
                                                    'code' => $id_wihi_part1,
                                                    'game_id' => $game->id,
                                                    'team_id' => $team1->id,
                                                    'provider' => 'apuestasg.com',
                                                    'bet_type_id' => $bettype->id,
                                                    'odd' => $data['descripcion'][0],
                                                    'link' => '1'
                                                ]);

                                                if($competitor1){
                                                    $competitor2 = Competitor::insert([
                                                        'code' => $id_wihi_part2,
                                                        'game_id' => $game->id,
                                                        'team_id' => $team2->id,
                                                        'provider' => 'apuestasg.com',
                                                        'bet_type_id' => $bettype->id,
                                                        'odd' => $data['descripcion'][1],
                                                        'link' => '1'
                                                    ]);

                                                    if($competitor2){
                                                        if (isset($data['descripcion'][2]) && isset($data['teams'][2])) {
                                                            $competitor3 = Competitor::insert([
                                                                'code' => $id_wihi_part3,
                                                                'game_id' => $game->id,
                                                                'team_id' => $team3->id,
                                                                'provider' => 'apuestasg.com',
                                                                'bet_type_id' => $bettype->id,
                                                                'odd' => $data['descripcion'][2],
                                                                'link' => '1'
                                                            ]);
                                                        }

                                                        $mensaje = "Se creó el partido correctamente";
                                                        $estatus = "correcto";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    $mensaje = "Escriba un dividendo 2 válido";
                                }
                            } else {
                                $mensaje = "Escriba un dividendo 1 válido";
                            }
                        } else {
                            $mensaje = 'Escriba un equipo 2 válido';
                        }
                    } else {
                        $mensaje = 'Escriba un equipo 1 válido';
                    }
                } else {
                    $mensaje = 'Escriba una fecha válida para el partido';
                }
            } else {
                $mensaje = 'Seleccione una liga válida';
            }
        } else {
            $mensaje = 'Seleccione un deporte válido';
        }

        $result = array(
            "status" => $estatus,
            "mensaje" => $mensaje,
            "id_categoria" => $data['category_id'],
            "id_liga" => $data['league_id'],
            "fecha_inicio" => $data['start'],
            "id_wihi_partido" => $data['web_id'],
            "equipos" => $data['teams'],
            "tipo_apuesta" => $bettype,
            "dividendos" => $data['descripcion']
        );

        return $this->successResponse([
            'game' => $data
        ], 200);
    }

    public function show($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

    public function byFilters(Request $request) {
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
        	$query->where('start', '>=', $data['start'] . " 00:01");
            $query->where('start', '<=', $data['start'] . " 23:59");
        }

        if (isset($data['name']) && $data['name'] != '' && $data['name'] != 'todos' && $data['name'] != 'todas') {
        	$query->whereHas('competitors', function ($queryC) use ($data) {
            	$queryC->whereHas('team', function ($queryT) use ($data) {
            		$queryT->where('name', 'like', '%' . $data['name'] . '%');
				});
			});
        }

        $games = $query->paginate(50);

        return $this->successResponse([
            'games' => $games
        ], 200);
    }

    public function resultCharge(Request $request) {
        $data = $request->all();
        $disponible = null;

        $result_exist = Result::whereGameId($data['game_id'])->first();

        if (!$result_exist) {
            $result = Result::create($data);

            $res = explode('!', $data['result']);

            if ($res[0] > $res[1]) {
                $competitors = Competitor::whereGameId($data['game_id'])
                ->without('team')->orderBy('id', 'asc')->get('id');

                $k=0;

                foreach ($competitors as $cp) {
                    if ($k == 0) {
                        $cp->update(['status' => 1]);
                    } else {
                        $cp->update(array('status' => 3));
                    }
                    $k++;
                }
            } elseif ($res[0] == $res[1]) {
                $competitors = Competitor::whereGameId($data['game_id'])
                ->without('team')->orderBy('id', 'asc')->get('id, team_id');

                foreach ($competitors as $cp) {
                    if ($cp->team_id == 1) {
                        $cp->update(array('status' => 1));
                    } else {
                        $cp->update(array('status' => 3));
                    }
                }
            } elseif ($res[0] < $res[1]) {
                $competitors = Competitor::whereGameId($data['game_id'])
                ->without('team')->orderBy('id', 'desc')->get('id');

                $k=0;

                foreach ($competitors as $cp) {
                    if ($k == 0) {
                        $cp->update(array('status' => 1));
                    } else {
                        $cp->update(array('status' => 3));
                    }
                    $k++;
                }
            } else {
                return $this->successResponse([
                    "status" => "error",
                    "mensaje" => "Error verificando tickets, por favor hágalo en la función en el módulo tickets"
                ], 200);
            }

            $selections = Selection::whereSample($data['game_id'])
            ->where('ticket_id', '!=', null)->get();

            if (count($selections) > 0) {
                foreach ($selections as $sel) {
                    $codigo = $sel['ticket_id'];
                    $disponible = 0.0001;
                    $acumulado = 1;

                    $ticket = Selection::whereTicketId($codigo)->get();
                    $full = 'true';

                    foreach ($ticket as $tik) {
                        $id_p = $tik['select_id'];

                        $competitor = Competitor::whereId($id_p)->first();

                        $odd_1 = $competitor["odd"];

                        $div_div = explode("/", $odd_1);

                        if (!isset($div_div[1])) {
                            $div_div[1] = 1;
                        }                                       

                        $decimal_odd = (intval($div_div[0]) / intval($div_div[1])) + 1;

                        if ($competitor['status'] == '1') { $acumulado = $acumulado * $decimal_odd; } 
                        elseif ($competitor['status'] == '2') { } 
                        elseif ($competitor['status'] == '3') { 
                            $full = 'false';

                            $parleys = Ticket::whereCode($codigo)->update(array('status' => 3));
                        } elseif ($competitor['status'] == '0') { $full = 'pendiente'; }
                    }

                    if ($full == 'true') {
                        $parleys = Ticket::whereId($codigo)->get();

                        Ticket::whereId($codigo)->update(array('status' => 1));

                        foreach ($parleys as $prly) {
                            $id_player =  $prly['player_id'];
                            $monto_pagar = $prly['amount'] * $acumulado;

                            $player = Player::whereId($id_player)->first();

                            $saldo = $player['available'];

                            $nuevo_saldo =  $saldo + $monto_pagar;

                            $player->update(['available' => $nuevo_saldo]);

                            $disponible = floatval($nuevo_saldo);

                        }
                    }
                }
            }
        } else {
            return $this->successResponse([
                "status" => "error",
                "mensaje" => "Ya existente"
            ], 200);
        }

        return $this->successResponse([
            "status" => "correcto",
            "disponible" => $disponible,
            "acumulado" => $acumulado,
            "full" => $player
        ], 200);
    }
}

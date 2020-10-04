<?php

namespace App\Http\Controllers\Api;

use App\Team;
use App\League;
use App\Ticket;
use App\Selection;
use App\Competitor;
use App\Inscription;
use App\Transaction;
use App\Helpers\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class TicketController extends ApiController
{
	public function loadTickets (Request $request) {
		$decim_tot = 1;
    	$cod_temp = '';
    	$i = 0;
	    $n = 0;
	    $vuelta = 0;

	    $user = Auth::user();
        $player = $user->player;

        $ticketes = Ticket::where('player_id', $user->player->id)->orderBy('id', 'desc')->paginate();

        // $ticketes = $player->tickets;

        foreach ($ticketes as $tik) {
        	foreach ($tik['selections'] as $sel) {
        		if ($sel->category_id == 7) {
	        		$sel->inscription;
	        		$sel->career->racecourse;
	        	}
        	}       	
        }

        return $this->successResponse($ticketes, 200);
	}

    public function add(Request $request) {
        $user = Auth::user();
        $player = $user->player;
        $data = $request->all();
        $i = 0;
	    $j = 0;
	    $m = 0;
	    $decim_tot = 1;
	    $cod_serial = substr(md5(rand()),0,10);  
	    $fecha = date("Y-m-d H:i:s");   

	    $monto = $data['montos']; 

       	if ($player->available >= $monto) {
       		$selections = $player->selections;

       		$ticketes[0] = []; 

       		if (count($selections) >= 1) {
       			foreach ($selections as $sel) {
       				if ($sel->game->start <= date("Y-m-d H:i:s")) {
		                $sel->delete();
		            } else {
		                $selecciones[] = $sel;

				        if ($sel->game) {
				        	$league = League::whereId($sel->game->league_id)->first();

				        	$ticketes[0]['selecciones'][$i]['id'] = $sel->id;
	                        
	                        $ticketes[0]['selecciones'][$i]['liga'] = $league->name;

	                        $id_select = $sel->select_id;

	                        foreach ($sel->game->competitors as $comp) {
			                    if ($comp->id == $sel->select_id) {
			                        $competitor = $comp;
			                        break;
			                    }
			                } 

	                        if ($competitor) {
	                        	$team_id = $competitor->team_id;

	                            // $odd_fracc = $competitor->odd;

	                            // $odd = explode("/", $odd_fracc);

	                            // if (!isset($odd[1])) {
	                            //     $odd[1] = 1;
	                            // }

	                            // $decimal_odd = (intval($odd[0]) / intval($odd[1])) + 1;
	                            // $decim_tot = $decimal_odd * $decim_tot;

	                            // $towin = $decim_tot * $monto;

	                            $selection = Functions::objArraySearch($competitor->data, "caption", $sel->type);

	                            $ticketes[0]['selecciones'][$i]['dividendo'] = $selection['quoteFloatValue'];

	                            $decim_tot = $decim_tot * $selection['quoteFloatValue'];

	                            $towin = $decim_tot * $monto;

	                            if ($competitor->bet_type_id == 1) {
	                            	if ($sel->type == 1) {
	                            		$ticketes[0]['selecciones'][$i]['equipo'] = $sel->game->teams[0]['name'] . " a ganar";
	                            	} elseif ($sel->type == 2) {
	                            		$ticketes[0]['selecciones'][$i]['equipo'] = $sel->game->teams[1]['name'] . " a ganar";
	                            	} else {
	                            		$ticketes[0]['selecciones'][$i]['equipo'] = "Empate";
	                            	}
	                            } else {
	                            	$ticketes[0]['selecciones'][$i]['equipo'] = $sel->type;
	                            }

	                            if (count($sel->game->teams) == 2) {
				                    $ticketes[0]['selecciones'][$i]['encuentro'] = $sel->game->teams[0]['name'] . " vs " . $sel->game->teams[1]['name'];
	                            } elseif (count($sel->game->teams) == 3) {
				                    $ticketes[0]['selecciones'][$i]['encuentro'] = $sel->game->teams[0]['name'] . " vs " . $sel->game->teams[1]['name'];
	                            }
	                        }
				        }
				        $i++;
				    }			        
	            }

	            $ticket_id = DB::table('tickets')->insertGetId(
				    [
				    	'code' => $cod_serial, 
				    	'player_id' => $player->id,
				    	'amount' => $monto,
				    	'towin' => $towin,
				    	'status' => 0,
				    	'created_at' => date('Y-m-d H:i:s'),
				    	'updated_at' => date('Y-m-d H:i:s')
				    ]
				);


				if ($ticket_id != 0) {
		        	// $selections->ticket_id = $ticket_id;
		        	// $selections->player_id = $player->id;
				    foreach ($selections as $sel) {
				    	$sel->update([				    	
					    	'player_id' => $player->id,
					    	'ticket_id' => $ticket_id
					    ]);
				    }
                }

				if ($ticket_id) {
					$ticketes[0]['id_usuario'] = $player->id;
					$ticketes[0]['cod_seguridad'] = $cod_serial;
					$ticketes[0]['correlativo'] = $ticket_id;
					$ticketes[0]['fecha_hora'] = $fecha;
					$ticketes[0]['monto'] = $monto;
					$ticketes[0]['cuota'] = $decim_tot;
					$ticketes[0]['a_ganar'] = $towin;
					$ticketes[0]['id_seleccion'] = $sel['select_id'];

					$nuevo_d = $player->available - $monto; 

					$transaction = Transaction::create([
						"event_type_id" => 1,
						"player_id" => $player->id,
						"ticket_id" => $cod_serial,
						"amount" => $monto,
						"player_balance" => $nuevo_d
					]);

					$player->available = $nuevo_d;
					if ($player->update()) {
						$disponible = $nuevo_d;
                        $response = array(
                            "status" => "success",
                            "ticketes" => $ticketes,
                            "disponible" => $disponible,
                            "mstatus" => "Ticket generado correctamente"
                        );
					}               
				}
       		} else {
       			$response = [
		            "status" => "error",
		            "ticketes" => null,
		            "mstatus" => "No posee selecciones para generar un ticket"
		        ];
       		}            
       	} else {
       		$response = [
	            "status" => "error",
	            "ticketes" => null,
	            "mstatus" => "No tiene saldo suficiente para hacer esta apuesta"
	        ];
       	}

       	return $this->successResponse($response, 200);
    }

    public function addHipism(Request $request) {
        $user = Auth::user();
        $player = $user->player;
        $data = $request->all();
        $i = 0;
	    $j = 0;
	    $m = 1;
	    $fecha = date("Y-m-d H:i:s");   

	    $monto = explode("#", $data['montos']);

       	if ($player->available >= $monto[$m]) {
       		$selections = Selection::where('player_id', $player->id)
            ->where(function ($query) {
                $query->where('ticket_id', '0')
                      ->orWhere('ticket_id', '')
                      ->orWhere('ticket_id', null);
            })
            ->with('career')
            ->get();

       		if (count($selections) >= 1) {
       			foreach ($selections as $sel) {
       				$cod_serial = substr(md5(rand()),0,10);
                    $selecciones[] = $sel;

                    if ($player->available >= $monto[$m]) {
                    	$inscription = Inscription::whereId($sel->select_id)->first();

                    	if ($inscription) {
                    		$ticketes[$i]['selecciones']['inscripcion'] = $inscription; 
                    		$ticketes[$i]['selecciones']['inscripcion']['carrera'] = $sel['career'];
                    		$ticketes[$i]['selecciones']['inscripcion']['hipodromo'] = $sel['career']['racecourse'];

                            $k = 0;
                    	}

                    	if ($monto[$m] != '' OR $monto[$m] > 0) {
                    		$monto_a = floatval($monto[$m]);

                    		$ticket_id = DB::table('tickets')->insertGetId(
							    [
							    	'code' => $cod_serial, 
							    	'player_id' => $player->id,
							    	'amount' => $monto_a,
							    	'towin' => 0,
							    	'status' => 0,
							    	'created_at' => date('Y-m-d H:i:s'),
							    	'updated_at' => date('Y-m-d H:i:s')
							    ]
							);

							if ($ticket_id != 0) {
						    	$sel->update([				    	
							    	'player_id' => $player->id,
							    	'ticket_id' => $ticket_id
							    ]);							    
			                }

			                if ($ticket_id) {
								$ticketes[0]['id_usuario'] = $player->id;
								$ticketes[0]['cod_seguridad'] = $cod_serial;
								$ticketes[0]['fecha_hora'] = $fecha;
								$ticketes[0]['monto'] = $monto_a;
								$ticketes[0]['a_ganar'] = 'Según dividendo';
								$ticketes[0]['id_seleccion'] = $sel['select_id'];

								$nuevo_d = $player->available - $monto_a;

								$transaction = Transaction::create([
									"event_type_id" => 1,
									"player_id" => $player->id,
									"ticket_id" => $cod_serial,
									"amount" => $monto_a,
									"player_balance" => $nuevo_d
								]);

								$player->available = $nuevo_d;

								if ($player->update()) {
									$disponible = $nuevo_d;
			                        
								}               
							}
                    	}

                    	$i++; $m++;
                    } else {
                    	break;
                    }		        
	            }
	            $response = array(
                    "status" => "success",
                    "ticketes" => $ticketes,
                    "disponible" => $disponible ?? 0,
                    "montos" => $monto,
                    "mstatus" => "Ticket generado correctamente"
                );
       		}            
       	} else {
       		$response = [
	            "status" => "error",
	            "ticketes" => null,
	            "mstatus" => "No tiene saldo suficiente para hacer esta apuesta"
	        ];
       	}

       	return $this->successResponse($response, 200);
    }
}

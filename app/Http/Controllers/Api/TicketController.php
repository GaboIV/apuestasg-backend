<?php

namespace App\Http\Controllers\Api;

use App\Competitor;
use App\Http\Controllers\ApiController;
use App\League;
use App\Selection;
use App\Team;
use App\Ticket;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $ticketes = $player->tickets;

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
	                        $ticketes[0]['selecciones'][$i]['dividendo'] = $sel->value;
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

	                            $odd_fracc = $competitor->odd;

	                            $odd = explode("/", $odd_fracc);

	                            if (!isset($odd[1])) {
	                                $odd[1] = 1;
	                            }

	                            $decimal_odd = (intval($odd[0]) / intval($odd[1])) + 1;
	                            $decim_tot = $decimal_odd * $decim_tot;

	                            $towin = $decim_tot * $monto;

	                            $ticketes[0]['selecciones'][$i]['equipo'] = $competitor->team->name;

	                            if (count($sel->game->competitors) == 2)
				                    $ticketes[0]['selecciones'][$i]['encuentro'] = $sel->game->competitors[0]['team']['name'] . " vs " . $sel->game->competitors[1]['team']['name'];
				                elseif (count($sel->game->competitors) == 3)
				                    $ticketes[0]['selecciones'][$i]['encuentro'] = $sel->game->competitors[0]['team']['name'] . " vs " . $sel->game->competitors[2]['team']['name'];
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
}

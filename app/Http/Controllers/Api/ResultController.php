<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Career;
use App\Player;
use App\Ticket;
use App\Result;
use App\Selection;
use App\Competitor;
use App\Helpers\Functions;
use App\Inscription;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\Jobs\VerifyTicketsJob;
use Illuminate\Database\Eloquent\Builder;

class ResultController extends ApiController
{

    public function byFilters(Request $request)
    {
        $data = $request->all();

        $query = Game::with('league.category', 'league.match_structure', 'sections', 'competitors');

        if (isset($data['category_id']) || isset($data['country_id'])) {
            $query->whereHas('league', function ($queryL) use ($data) {
                if (isset($data['category_id']) && $data['category_id'] != 0)
                    $queryL->where('category_id', '=', $data['category_id']);
                if (isset($data['country_id']) && $data['country_id'] != 0)
                    $queryL->where('country_id', '=', $data['country_id']);
            });
        }

        if (isset($data['start']) && $data['start'] != 0) {
            $query->where('start', '>=', $data['start'] . " 00:00");
            $query->where('start', '<=', $data['start'] . " 23:59");
        }

        if (isset($data['name']) && $data['name'] != '' && $data['name'] != 'todos' && $data['name'] != 'todas') {
            $query->whereHas('teams', function ($queryC) use ($data) {
                $queryC->Where('name', 'LIKE', "%" . $data['name'] . "%");
                $queryC->orWhere('name_id', 'LIKE', "%" . $data['name'] . "%");
            });
        }

        $games = $query
            ->orderBy('start', 'asc')
            ->paginate(50);

        foreach ($games as $game) {
            if ($game->status == 3) {
                // $result = Result::whereGameId($game->id)->first();

                // $res = explode('!', $result['result']);

                // if (count($res) == 2) {
                //     $game->competitors[0]['result'] = $res[0];
                //     $game->competitors[1]['result'] = $res[1];
                // }
            }
        }

        return $this->successResponse([
            'games' => $games
        ], 200);
    }

    public function byHipismFilters(Request $request)
    {
        $data = $request->all();
        $fecha_actual = date("Y-m-d H:i:s");
        $i = 0;
        $carreras = [];

        // $query = Career::orderBy('date', 'asc');

        $query = Career::orderBy('date', 'asc')->with('inscriptions');

        if (isset($data['id']) && $data['id'] != 0)
            $query->whereId($data['id']);

        // $cquery->where('date', '<', $fecha_actual);

        if (isset($data['start']) && $data['start'] != 0) {
            $query->where('date', '>=', $data['start'] . " 00:00");
            $query->where('date', '<=', $data['start'] . " 23:59");
        }

        $careers = $query->get();

        foreach ($careers as $car) {
            $carreras[$i]['id'] = $car->id;
            $carreras[$i]['date'] = $car->date;
            $carreras[$i]['number'] = $car->number;
            $carreras[$i]['inscriptions'] = $car->inscriptions;

            $resultado = Result::whereCategoryId(7)
                ->whereGameId($car->id)
                ->first();

            if ($resultado) {
                $result = explode('!', $resultado->result);

                $ganador = explode("#", $result[0]);
                $place = explode("#", $result[1]);
                $third = explode("#", $result[2]);

                $carreras[$i]['cuadro'][0]['ejemplar'] = $ganador[0];
                $carreras[$i]['cuadro'][0]['cuota'] = $ganador[1];

                $carreras[$i]['cuadro'][1]['ejemplar'] = $place[0];
                $carreras[$i]['cuadro'][1]['cuota'] = $place[1];

                $carreras[$i]['cuadro'][2]['ejemplar'] = $third[0];
                $carreras[$i]['cuadro'][2]['cuota'] = $third[1];
            } else {
                $carreras[$i]['cuadro'][0]['ejemplar'] = null;
                $carreras[$i]['cuadro'][0]['cuota'] = null;

                $carreras[$i]['cuadro'][1]['ejemplar'] = null;
                $carreras[$i]['cuadro'][1]['cuota'] = null;

                $carreras[$i]['cuadro'][2]['ejemplar'] = null;
                $carreras[$i]['cuadro'][2]['cuota'] = null;
            }

            $i++;
        }

        return $this->successResponse([
            'carreras' => $carreras
        ], 200);
    }

    public function resultChargeOld(Request $request)
    {
        $data = $request->all();
        $disponible = null;

        $result_exist = Result::whereGameId($data['game_id'])
            ->where('category_id', '!=', 7)
            ->first();

        if (!$result_exist) {
            $result = Result::create($data);

            Game::whereId($data['game_id'])->update(array('status' => 3));

            $res = explode('!', $data['result']);

            if ($res[0] > $res[1]) {
                $competitors = Competitor::whereGameId($data['game_id'])
                    ->without('team')->orderBy('id', 'asc')->get('id');

                $k = 0;

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
                    ->without('team')->orderBy('id', 'asc')->get();

                foreach ($competitors as $cp) {
                    if ($cp['team_id'] == 1) {
                        $cp->update(array('status' => 1));
                    } else {
                        $cp->update(array('status' => 3));
                    }
                }
            } elseif ($res[0] < $res[1]) {
                $competitors = Competitor::whereGameId($data['game_id'])
                    ->without('team')->orderBy('id', 'desc')->get('id');

                $k = 0;

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
                ->where('category_id', '!=', 7)
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

                        if ($competitor['status'] == '1') {
                            $acumulado = $acumulado * $decimal_odd;
                        } elseif ($competitor['status'] == '2') {
                        } elseif ($competitor['status'] == '3') {
                            $full = 'false';

                            $parleys = Ticket::whereId($codigo)->update(array('status' => 3));
                        } elseif ($competitor['status'] == '0') {
                            $full = 'pendiente';
                        }
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

                            $transaction = Transaction::create([
                                "event_type_id" => 3,
                                "player_id" => $player->id,
                                "ticket_id" => $prly->code,
                                "amount" => $monto_pagar,
                                "player_balance" => $nuevo_saldo
                            ]);
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
            "status" => "correcto"
        ], 200);
    }

    public function resultCharge(Request $request)
    {
        $data = $request->all();
        $disponible = null;

        $result_exist = Game::whereId($data['game_id'])->first()->result;

        if (!$result_exist) {
            foreach ($data['data'] as $key => $opt) {
                if ($key != 'result') {
                    $result = Competitor::whereId($key)->update([
                        "winner" => $opt
                    ]);

                    $tickets = Ticket::whereHas('selections', function ($query) use ($key, $opt) {
                        $query->Where('select_id', $key)
                            ->where('category_id', '!=', '7');
                    })
                        ->with('selections')
                        ->whereStatus(0)
                        ->get();

                    foreach ($tickets as $key => $ticket) {
                        $pay = true;
                        $odd_to_pay = 1;

                        foreach ($ticket->selections as $key => $selection) {
                            if (!$selection->competitor->winner) {
                                $pay = false;
                            } else {
                                if ($selection->competitor->winner == $selection->type) {
                                    \Log::info("Odd_to_pay anterior: " . $odd_to_pay);

                                    $odd_to_pay = $odd_to_pay * floatval($selection->value);

                                    \Log::info("Odd_to_pay multiplicador: " . floatval($selection->value));

                                    \Log::info("Odd_to_pay resultado: " . $odd_to_pay);
                                } elseif ($selection->competitor->winner != $selection->type) {
                                    $pay = false;
                                    $ticket->update(["status" => 3]);
                                }
                            }
                        }

                        if ($pay) {
                            $player_id =  $ticket['player_id'];
                            $amount_to_pay = $ticket['amount'] * $odd_to_pay;

                            $player = Player::whereId($player_id)->first();

                            $ticket->update([
                                "status" => 1
                            ]);

                            $balance = $player['available'];

                            $new_balance =  $balance + $amount_to_pay;

                            $player->update(['available' => $new_balance]);

                            $transaction = Transaction::create([
                                "event_type_id" => 3,
                                "player_id" => $player->id,
                                "ticket_id" => $ticket->code,
                                "amount" => $amount_to_pay,
                                "player_balance" => $new_balance
                            ]);
                        }
                    }

                    // $selections = Selection::whereSample($data['game_id'])
                    // ->where('category_id', '!=', 7)
                    // ->whereSelectId($key)
                    // ->where('ticket_id', '!=', null)->get();

                    // if (count($selections) > 0) {
                    //     foreach ($selections as $sel) {
                    //         $codigo = $sel['ticket_id'];
                    //         $disponible = 0.0001;
                    //         $acumulado = 1;

                    //         $selections_ticket = Selection::whereTicketId($codigo)->with('competitor')->get();

                    //         $full = 'true';

                    //         foreach ($selections_ticket as $tik) {
                    //             $id_p = $tik['select_id'];

                    //             $competitor = $tik['competitor'];

                    //             if ($competitor['winner'] == $tik['type']) { 
                    //                 $acumulado = $acumulado * $sel['value']; 
                    //             } elseif ($competitor['winner'] == 'Desc.') {

                    //             } elseif (is_null($competitor['winner'])) { 
                    //                 $full = 'pendiente'; 
                    //             } elseif (! is_null($competitor['winner']) && $competitor['winner'] != $tik['type']) { 
                    //                 $full = 'false';

                    //                 $parleys = Ticket::whereId($codigo)->update(array('status' => 3));
                    //             } 
                    //         }

                    //         if ($full == 'true') {
                    //             $prly = Ticket::whereId($codigo)->first();

                    //             \Log::info("Ticket a pagar: " . $prly->id);

                    //             \Log::info("Acumulado: " . $acumulado);

                    //             Ticket::whereId($codigo)->update(array('status' => 1));

                    //             if ($prly) {
                    //                 $id_player =  $prly['player_id'];
                    //                 $monto_pagar = $prly['amount'] * $acumulado;

                    //                 $player = Player::whereId($id_player)->first();

                    //                 $saldo = $player['available'];

                    //                 $nuevo_saldo =  $saldo + $monto_pagar;

                    //                 \Log::info("Total a pagar: " . $monto_pagar);

                    //                 $player->update(['available' => $nuevo_saldo]);

                    //                 $disponible = floatval($nuevo_saldo);

                    //                 $transaction = Transaction::create([
                    //                     "event_type_id" => 3,
                    //                     "player_id" => $player->id,
                    //                     "ticket_id" => $prly->code,
                    //                     "amount" => $monto_pagar,
                    //                     "player_balance" => $nuevo_saldo
                    //                 ]);
                    //             }
                    //         }
                    //     }
                    // }
                }
            }

            Game::whereId($data['game_id'])->update(['status' => 3, 'result' => $data['data']['result']]);
        } else {
            return $this->successResponse([
                "status" => "error",
                "mensaje" => "Resultado existente"
            ], 200);
        }

        return $this->successResponse([
            "status" => "correcto"
        ], 200);
    }

    public function resultSections(Request $request)
    {
        $data = $request->all();
        $disponible = null;

        $game = Game::whereId($data['game_id'])->with('competitors.bet_type', 'league.match_structure')->first();

        $game['result_halftime'] = 0;
        $game['result_fullmatch'] = 0;
        $game['win_halftime'] = null;
        $game['win_fullmatch'] = null;

        $halftime_number = $game->league->match_structure->halftime;

        $result = Result::updateOrCreate([
            "game_id" => $data['game_id']
        ], [
            "result" => $data['data']
        ]);

        foreach ($game->teams as $key => $team) {
            $team['result_halftime'] = 0;
            $team['result_fullmatch'] = 0;

            foreach ($data['data'] as $key_result => $result) {
                if ($key_result == $halftime_number) {
                    $team['result_halftime'] += $result[$key];
                }

                $team['result_fullmatch'] += $result[$key];
            }

            $game['result_halftime']  += $team['result_halftime'];
            $game['result_fullmatch'] += $team['result_fullmatch'];
        }

        if (count($game['teams']) == 2) {
            $game['win_halftime'] = Functions::resultThreeOptions(
                $game['teams'][0]['result_halftime'], 
                $game['teams'][1]['result_halftime']
            );

            $game['win_fullmatch'] = Functions::resultThreeOptions(
                $game['teams'][0]['result_fullmatch'], 
                $game['teams'][1]['result_fullmatch']
            );

            Game::whereId($data['game_id'])->update([
                "result" => $game['teams'][0]['result_fullmatch'] . "-" . $game['teams'][1]['result_fullmatch']
            ]);
        }

        foreach ($game->competitors as $key => $competitor) {
            switch ($competitor->bet_type->name) {
                case 'standard':
                    $competitor->update([
                        "winner" => [$game['win_fullmatch']]
                    ]);
                break;

                case 'double-chance':
                    switch ($game['win_fullmatch']) {
                        case '1':
                            $competitor->update([
                                "winner" => ["1X", "12"]
                            ]);
                            break;

                        case 'X':
                            $competitor->update([
                                "winner" => ["1X", "X2"]
                            ]);
                            break;

                        case '2':
                            $competitor->update([
                                "winner" => ["X2", "12"]
                            ]);
                            break;
                    }
                break;

                case 'handicap':
                    $handicap = explode(":", $competitor->code);

                    $competitor_winner_handicap = Functions::resultThreeOptions(
                        $game['teams'][0]['result_fullmatch'] + $handicap[0], 
                        $game['teams'][1]['result_fullmatch'] + $handicap[1]
                    );

                    $competitor->update([
                        "winner" => [$competitor_winner_handicap]
                    ]);
                break; 
                
                case 'points-more-less-than':
                    if ($competitor->code < $game['result_fullmatch']) {
                        $competitor_winner_than = "+";
                    } elseif ($competitor->code > $game['result_fullmatch']) {
                        $competitor_winner_than = "-";
                    } else {
                        $competitor_winner_than = "0";
                    }

                    $competitor->update([
                        "winner" => [$competitor_winner_than]
                    ]);
                break;

                case 'section-win':
                    $competitor->update([
                        "winner" => [$game['win_halftime']]
                    ]);
                break;

                case 'section-points-more-less':
                    if ($competitor->code < $game['result_fullmatch']) {
                        $competitor_winner_than = "+";
                    } elseif ($competitor->code > $game['result_fullmatch']) {
                        $competitor_winner_than = "-";
                    } else {
                        $competitor_winner_than = "0";
                    }

                    $competitor->update([
                        "winner" => [$competitor_winner_than]
                    ]);
                break;

                case 'head-to-head':
                    $competitor_winner_head = Functions::resultTwoOptions(
                        $game['teams'][0]['result_halftime'], 
                        $game['teams'][1]['result_halftime']
                    );

                    $competitor->update([
                        "winner" => [$competitor_winner_head]
                    ]);
                break;

                case 'score-both':
                    $competitor_winner_both = Functions::resultScoreBothOptions(
                        $game['teams'][0]['result_halftime'], 
                        $game['teams'][1]['result_halftime']
                    );

                    $competitor->update([
                        "winner" => [$competitor_winner_both]
                    ]);
                break;
            }
        }

        VerifyTicketsJob::dispatch(["id" => $game->id]);

        return $this->successResponse([
            "status" => "correcto",
            "game" => $game
        ], 200);
    }

    public function resultHipismCharge(Request $request)
    {
        $data = $request->all();
        $disponible = null;

        $result_exist = Result::whereGameId($data['game_id'])
            ->whereCategoryId($data['category_id'])
            ->first();

        if (!$result_exist) {
            $result = Result::create($data);

            $career = Career::whereId($data['game_id'])
                ->with('inscriptions')
                ->first();

            $career->update(array('status' => 3));

            $res = explode('!', $data['result']);

            $win = explode('#', $res[0]);
            $place = explode('#', $res[1]);
            $show = explode('#', $res[2]);

            if ($win[1] < 3400) {
                $cuota1 = 1.7; // 3740
            } elseif ($win[1] > 3400 and $win[1] < 6000) {
                $cuota1 = ($win[1] + 500) / 2200;
            } elseif ($win[1] > 6000) {
                $cuota1 = ($win[1] + 3000) / 2200;
            }

            foreach ($career['inscriptions'] as $ins) {
                if ($ins->id == $win[0]) {
                    $ins->update([
                        'status' => 1,
                        'odd' => $win[1]
                    ]);
                } elseif ($ins->id == $place[0]) {
                    $ins->update([
                        'status' => 2,
                        'odd' => $place[1]
                    ]);
                } elseif ($ins->id == $show[0]) {
                    $ins->update([
                        'status' => 3,
                        'show' => $show[1]
                    ]);
                } else {
                    $ins->update(['status' => 99]);
                }
            }

            $selections = Selection::whereSample($data['game_id'])
                ->whereCategoryId($data['category_id'])
                ->where('ticket_id', '!=', null)->get();

            if (count($selections) > 0) {
                foreach ($selections as $sel) {
                    $codigo = $sel['ticket_id'];

                    $ticket = Selection::whereTicketId($codigo)->get();

                    if (count($ticket) > 0) {
                        $full = 'true';
                        foreach ($ticket as $tik) {
                            $id_p = $tik['select_id'];
                            $ide = $tik['id'];

                            $inscription = Inscription::whereId($id_p)->first();

                            if ($inscription['status'] == 1 && $tik['type'] == 7) {
                                Selection::whereId($ide)->update(array('value' => $cuota1));
                            } elseif ($inscription['status'] == 2 && $tik['type'] == 7) {
                                $full = 'false';

                                $parleys = Ticket::whereId($codigo)->update(array('status' => 3));
                            } elseif ($inscription['status'] == 3 && $tik['type'] == 7) {
                                $full = 'false';

                                $parleys = Ticket::whereId($codigo)->update(array('status' => 3));
                            } elseif ($inscription['status'] == 0) {
                                $full = 'pendiente';
                            } else {
                                $full = 'false';

                                $parleys = Ticket::whereId($codigo)->update(array('status' => 3));
                            }
                        }
                    }

                    if ($full == 'true') {
                        $parleys = Ticket::whereId($codigo)->get();

                        foreach ($parleys as $prly) {
                            $id_player =  $prly['player_id'];
                            $monto_pagar = $prly['amount'] * $cuota1;

                            $prly->update(array(
                                'status' => 1,
                                'towin' => $monto_pagar
                            ));

                            $player = Player::whereId($id_player)->first();

                            $saldo = $player['available'];

                            $nuevo_saldo =  $saldo + $monto_pagar;

                            $player->update(['available' => $nuevo_saldo]);

                            $disponible = floatval($nuevo_saldo);

                            $transaction = Transaction::create([
                                "event_type_id" => 3,
                                "player_id" => $player->id,
                                "ticket_id" => $prly->code,
                                "amount" => $monto_pagar,
                                "player_balance" => $nuevo_saldo
                            ]);
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
            "status" => "correcto"
        ], 200);
    }
}

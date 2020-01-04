<?php

namespace App\Http\Controllers\Api;

use App\Competitor;
use App\Game;
use App\Http\Controllers\ApiController;
use App\Player;
use App\Result;
use App\Selection;
use App\Ticket;
use App\Transaction;
use Illuminate\Http\Request;

class ResultController extends ApiController {

    public function byFilters(Request $request) {
        $data = $request->all();

        $query = Game::with('league.category')->with(['competitors' => function($queryA) {
            $queryA->where('team_id', '!=', 1);
        }]);

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

        $games = $query
        ->orderBy('start', 'asc')
        ->paginate(50);

        foreach ($games as $game) {
            if ($game->status == 3) {
                $result = Result::whereGameId($game->id)->first();

                $res = explode('!', $result['result']);

                if (count($res) == 2) {
                    $game->competitors[0]['result'] = $res[0];
                    $game->competitors[1]['result'] = $res[1];
                }
            }
        }

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

            Game::whereId($data['game_id'])->update(array('status' => 3));

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

                            $parleys = Ticket::whereId($codigo)->update(array('status' => 3));
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

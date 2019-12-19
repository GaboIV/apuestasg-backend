<?php

namespace App\Http\Controllers\Api;

use App\Competitor;
use App\Game;
use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Selection;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends ApiController {
    public function loadSelections() {
        $user = Auth::user();
        $player = $user->player;
        $selecciones = [];
        $tipo = '';
        $decim_tot = 1;

        $selections = $player->selections;

        $i = 0;

        foreach ($selections as $sel) {
            if ($sel->game->start <= date("Y-m-d H:i:s")) {
                $sel->delete();
            } else {
                if ($sel['category_id'] == '7') {
                    
                } else {
                    $tipo = "2x";

                    $id_part_2 = $sel->competitor["id"];
                    $id_equipo = $sel->competitor["team_id"];
                    $div_equipo_part1 = $sel["value"];

                    $div_div = explode("/", $div_equipo_part1);

                    if (!isset($div_div[1])) {
                        $div_div[1] = 1;
                    }

                    $decimal_odd = (intval($div_div[0]) / intval($div_div[1])) + 1;
                    $decim_tot = $decim_tot * $decimal_odd;

                    foreach ($sel->game->competitors as $comp) {
                        if ($comp->id == $sel->select_id) {
                            $f8 = $comp;
                            break;
                        }
                    }             

                    $id_partido = $f8["game_id"];

                    $name_partido =  $sel->game->web_id;

                    $selecciones[$i]['value'] = $sel->value; 
                    $selecciones[$i]['id'] = $sel->id;   
                    $selecciones[$i]['equipo'] = $f8->team->name;
                    
                    $decimal_odd = (intval($div_div[0]) / intval($div_div[1])) + 1;

                    if (count($sel->game->competitors) == 2)
                        $selecciones[$i]['encuentro'] = $sel->game->competitors[0]['team']['name'] . " vs " . $sel->game->competitors[1]['team']['name'];
                    elseif (count($sel->game->competitors) == 3)
                        $selecciones[$i]['encuentro'] = $sel->game->competitors[0]['team']['name'] . " vs " . $sel->game->competitors[2]['team']['name'];                             
                }
                $i++; 
            }             
        }

        return $this->successResponse([
            "tipo" => $tipo,
            "selecciones" => $selecciones,
            "quot" => $decim_tot
        ], 200);
    }

    public function select(Request $request) {
        $user = Auth::user();
        $player = $user->player;
        $data = $request->all();
        $cuota = 1;
        $decim_tot = 1;
        $status = '';
        $mstatus = '';
        $selecciones = [];
        $tipo = '';
        
        $exists = Selection::whereSelectId($data['bet_id'])
        ->where('player_id', $player->id)
        ->where(function ($query) {
            $query->where('ticket_id', '0')
                  ->orWhere('ticket_id', '')
                  ->orWhere('ticket_id', null);
        })
        ->first();

        if ($exists) {
            $exists->delete();
            $status= "success"; 
            $mstatus = "Selección eliminada";
        } else {
            $competitor = Competitor::whereId($data['bet_id'])->first();

            $odd = $competitor["odd"];
            $game_id = $competitor["game_id"];

            $exists2 = Selection::whereSample($game_id)
            ->where('player_id', $player->id)
            ->where(function ($query) {
                $query->where('ticket_id', '0')
                      ->orWhere('ticket_id', '')
                      ->orWhere('ticket_id', null);
            })
            ->get();

            if (count($exists2) > 0) {
                $status = "info";
                $mstatus = "Ya tiene una selección para este encuentro deportivo";
            } else {
                $selection = new Selection;
                $selection->select_id = $data['bet_id'];
                $selection->sample = $game_id;
                $selection->value = $odd;
                $selection->category_id = $data['category_id'];
                $selection->ticket_id = null;

                $player->selections()->save($selection);

                $status = "success";
                $mstatus = "Selección agregada";
            }               
        }

        $selections = $player->selections;
        $i = 0;

        foreach ($selections as $sel) {
            if ($sel->game->start <= date("Y-m-d H:i:s")) {
                $sel->delete();
            } else {
                $odd_fracc = $sel["value"];
                $div_div = explode("/", $odd_fracc);
                if (!isset($div_div[1])) {
                    $div_div[1] = 1;
                }       
                $decimal_odd = (intval($div_div[0]) / intval($div_div[1])) + 1;
                $decim_tot = $decim_tot * $decimal_odd;

                if (count($sel->game->competitors) == '3') {
                    $selecciones[$i]['encuentro'] = $sel['game']['competitors'][0]['team']['name'] . " vs " . $sel['game']['competitors'][2]['team']['name'];
                }

                foreach ($sel->game->competitors as $comp) {
                    if ($comp->id == $sel->select_id) {
                        $f8 = $comp;
                        break;
                    }
                }

                $selecciones[$i]['value'] = $selections[$i]->value; 
                $selecciones[$i]['id'] = $selections[$i]->id;   
                $selecciones[$i]['equipo'] = $f8->team->name;

                $i++;
            }
        }


        return $this->successResponse([
            "status" => $status,
            "mstatus" => $mstatus,
            'selections' => $selecciones,
            'quot' => $decim_tot
        ], 200);
    }

    public function deleteSelect ($id) {
        if ($id == 'all') {
            $user = Auth::user();
            $player = $user->player;
            $player->selections()->forceDelete();

            $result = array(
                "status" => 'success',
                "mstatus" => 'Selecciones eliminadas'
            ); 
        } else {
            $select = Selection::find($id);

            if ($select) {
                if ($select->delete()){
                    $result = array(
                        "status" => 'success',
                        "mstatus" => 'Selección eliminada'
                    ); 
                }; 
            } else {
                $result = array(
                    "status" => 'error',
                    "mstatus" => 'No se puede eliminar la selección'
                );
            }
        }

        return $this->successResponse($result, 200);        
    }

    public function login (LoginRequest $request) {
        $nick = $request->nick;
        $password = $request->password;
        $menu = [];

        if ($request->tipoken == 'token') {
            $user = Auth::user();
            $apiToken = 'current';
        } else {
        	return $this->errorResponse("Acción no permitida.", 403); 
        }

        if ($user->hasRole('admin')) {
            $o = 0;
            $menu[$o] = array(
                'titulo' => 'Usuarios',
                'icono' => 'fas fa-users-cog',
                'data' => 'Ir a Usuarios',
   
                'link' => 'usuarios'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Depósitos',
                'icono' => 'fas fa-funnel-dollar',
                'data' => 'Ir a Depósitos',
                'link' => 'adm-depositos'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Resultados',
                'icono' => 'fas fa-flag-checkered',
                'data' => 'Ir a Resultados',
                'link' => 'resultados'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Caballos',
                'icono' => 'fas fa-chess-knight',
                'data' => 'Ir a Caballos',
                'link' => 'caballos'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Partidos',
                'icono' => 'fab fa-patreon',
                'data' => 'Ir a Partidos',
                'link' => 'partidos'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Actualizaciones',
                'icono' => 'fas fa-redo',
                'data' => 'Ir a Actualizaciones',
                'link' => 'actualizaciones'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'TipoApuestas',
                'icono' => 'fas fa-list-ul',
                'data' => 'Ir a Tipos de Apuesta',
                'link' => 'tipoApuestas'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Nacionalidades',
                'icono' => 'far fa-flag',
                'data' => 'Ir a Nacionalidades',
                'link' => 'nacionalidades'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Ligas',
                'icono' => 'fas fa-trophy',
                'data' => 'Ir a Ligas',
                'link' => 'ligas'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Equipos',
                'icono' => 'fab fa-first-order',
                'data' => 'Ir a Equipos',
                'link' => 'equipos'
            ); $o++;
            $menu[$o] = array(
                'titulo' => 'Mensajes',
                'icono' => 'fa fa-mail-bulk',
                'data' => 'Ir a Mensajes',
                'link' => 'mensajes'
            ); $o++;

            $menu[$o] = array(
                'titulo' => 'Promociones',
                'icono' => 'fa fa-gift',
                'data' => 'Ir a Promociones',
                'link' => 'promociones'
            ); $o++;

            $menu[$o] = array(
                'titulo' => 'Noticias',
                'icono' => 'fa fa-newspaper',
                'data' => 'Ir a Noticias',
                'link' => 'noticias'
            ); $o++;

            $menu[$o] = array(
                'titulo' => 'Bancos',
                'icono' => 'fa fa-university',
                'data' => 'Ir a Bancos',
                'link' => 'bancos'
            ); $o++;

            $menu[$o] = array(
                'titulo' => 'Estadísticas',
                'icono' => 'fa fa-percent',
                'data' => 'Ir a Estadísticas',
                'link' => 'estadisticas/'
            ); $o++;

            $menu[$o] = array(
                'titulo' => 'Versiones',
                'icono' => 'fas fa-laptop-code',
                'data' => 'Ir a Versiones',
                'link' => 'changelog'
            ); $o++;

        } elseif ($user->hasRole('player')) {                
            $menu[0] = array(
                'titulo' => 'Mi Cuenta',
                'icono' => 'fa fa-universal-access',
                'data' => 'Ir a Mi Cuenta',
                'link' => 'miCuenta'
            );

            $menu[1] = array(
                'titulo' => 'Historial',
                'icono' => 'fa fa-history',
                'data' => 'Ir a Historial',
                'link' => 'historial/'
            );

            $menu[2] = array(
                'titulo' => 'Mensajes',
                'icono' => 'fa fa-mail-bulk',
                'data' => 'Ir a Mensajes',
                'link' => 'mensajes/'
            );

            $menu[3] = array(
                'titulo' => 'Promociones',
                'icono' => 'fa fa-gift',
                'data' => 'Ir a Promociones',
                'link' => 'promociones'
            );

            $menu[4] = array(
                'titulo' => 'Noticias',
                'icono' => 'fa fa-newspaper',
                'data' => 'Ir a Noticias',
                'link' => 'noticias'
            );

            $menu[5] = array(
                'titulo' => 'Bancos',
                'icono' => 'fa fa-university',
                'data' => 'Ir a Bancos',
                'link' => 'bancos'
            );

            $menu[6] = array(
                'titulo' => 'Estadísticas',
                'icono' => 'fa fa-percent',
                'data' => 'Ir a Estadísticas',
                'link' => 'estadisticas/'
            );
             $menu[7] = array(
                'titulo' => 'Resultados',
                'icono' => 'fas fa-flag-checkered',
                'data' => 'Ir a Resultados',
                'link' => 'verResultados'
            );
        }

        $data = array(
            'access_token' => $apiToken,
            'user' => $user,
            'menu' => $menu
        );        
        
        return $this->successResponse($data, 200);
    }
}

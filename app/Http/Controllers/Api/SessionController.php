<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Team;
use App\Selection;
use App\Competitor;
use App\Inscription;
use Illuminate\Http\Request;
use App\Events\UserSessionChanged;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class SessionController extends ApiController 
{
    public function loadSelections() 
    {
        $user = Auth::user();
        $player = $user->player;
        $selecciones = [];
        $tipo = '';
        $decim_tot = 1;

        $selections = $player->selections;

        $i = 0;

        foreach ($selections as $sel) {
            if ($sel->category_id == 7) {
                $tipo = "7";

                if (($sel->career->date . " " . $sel->career->time) <= date("Y-m-d H:i:s")) {
                    $sel->delete();
                } else {
                    $oins = Inscription::whereId($sel->select_id)->first();

                    $selecciones[$i]['id'] = $sel->id;
                    $selecciones[$i]['numero'] = $oins->number;
                    $selecciones[$i]['horse'] = $oins->horse->name;
                    $selecciones[$i]['carrera'] = $sel->career->number;
                    $selecciones[$i]['hipodromo'] = $sel->career->racecourse->name;
                    $selecciones[$i]['fecha_hora'] = $sel->career->date . " " . $sel->career->time;
                }
                $i++; 
            } else {
                if ($sel->game->start <= date("Y-m-d H:i:s")) {
                    $sel->delete();
                } else {                    
                    $tipo = "2x";

                    $selecciones[$i]['encuentro'] = $sel->game->encuentro;

                    foreach ($sel->game->competitors as $comp) {
                        if ($comp->id == $sel->select_id) {
                            $f8 = $comp;
                            break;
                        }
                    }

                    foreach ($f8->data as $key => $item) {
                        if ($item['caption'] == $sel->type) {
                            $selected_item = $item;
                            break;
                        }
                    }

                    if ($selected_item['caption'] == "X") {
                        $selection_name = "Empate";
                    } else {
                        $selection_name = $sel->game->teams[$selected_item['caption'] - 1]->name;
                    }

                    $decim_tot = $decim_tot * $selections[$i]->value;

                    $selecciones[$i]['id'] = $selections[$i]->id;  
                    $selecciones[$i]['game_id'] = $selections[$i]->sample;  
                    $selecciones[$i]['select'] = $selections[$i]->type; 
                    $selecciones[$i]['value'] = $selections[$i]->value; 
                    $selecciones[$i]['equipo'] = $selection_name;
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

    public function select(Request $request)
    {
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
        ->where('type', $data['item_id'])
        ->where('player_id', $player->id)
        ->where(function ($query) {
            $query->where('ticket_id', '0')
                  ->orWhere('ticket_id', '')
                  ->orWhere('ticket_id', null);
        })
        ->first() ?? null;

        if ($exists) {
            $exists->delete();
            $status= "success"; 
            $mstatus = "Selección eliminada";
        } else {
            $exists1 = Selection::where('player_id', $player->id)
            ->where(function ($query) {
                $query->where('ticket_id', '0')
                      ->orWhere('ticket_id', '')
                      ->orWhere('ticket_id', null);
            })
            ->first();

            if (isset($exists1) && $exists1->category_id == '7') {
                $mstatus = "No puede combinar selecciones de deporte e hipismo";
                $status = 'warning';
                $selecciones = [];
                $tipo = '7';
            } else {
                $competitor = Competitor::whereId($data['bet_id'])->first();

                foreach ($competitor->data as $key => $item) {
                    if ($item['caption'] == $data['item_id'])
                        $selected = $item;
                }

                $odd = $selected['quoteFloatValue'];
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
                    $selection->type = $data['item_id'];
                    $selection->sample = $game_id;
                    $selection->value = $odd;
                    $selection->category_id = $data['category_id'];
                    $selection->ticket_id = null;

                    $player->selections()->save($selection);

                    $status = "success";
                    $mstatus = "Selección agregada";
                } 
            }                          
        }

        if ($tipo != '7') {
            $selections = $player->selections;
            $i = 0;

            foreach ($selections as $sel) {
                if ($sel->game->start <= date("Y-m-d H:i:s")) {
                    $sel->delete();
                } else {
                    $decim_tot = $decim_tot * (float) $sel->value;

                    $selecciones[$i]['encuentro'] = $sel->game->encuentro;

                    foreach ($sel->game->competitors as $comp) {
                        if ($comp->id == $sel->select_id) {
                            $f8 = $comp;
                            break;
                        }
                    }

                    foreach ($f8->data as $key => $item) {
                        if ($item['caption'] == $sel->type) {
                            $selected_item = $item;
                            break;
                        }
                    }

                    if ($selected_item['caption'] == "X") {
                        $selection_name = "Empate";
                    } else {
                        $selection_name = $sel->game->teams[$selected_item['caption'] - 1]->name;
                    }

                    $selecciones[$i]['id'] = $selections[$i]->id;  
                    $selecciones[$i]['game_id'] = $selections[$i]->sample;  
                    $selecciones[$i]['select'] = $selections[$i]->type; 
                    $selecciones[$i]['value'] = $selections[$i]->value; 
                    $selecciones[$i]['equipo'] = $selection_name;

                    $i++;
                }
            }
        }

        return $this->successResponse([
            "status" => $status,
            "mstatus" => $mstatus,
            'selections' => $selecciones,
            'quot' => $decim_tot
        ], 200);
    }

    public function selectHipism(Request $request) {
        $user = Auth::user();
        $player = $user->player;
        $data = $request->all();
        
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
            $mstatus = "Jugada eliminada";
        } else {
            $exists1 = Selection::where('player_id', $player->id)
            ->where(function ($query) {
                $query->where('ticket_id', '0')
                      ->orWhere('ticket_id', '')
                      ->orWhere('ticket_id', null);
            })
            ->first();

            if (isset($exists1) && $exists1->category_id != '7') {
                $mstatus = "No se pueden combinar selecciones de deporte e hipismo";
                $status = 'warning';
                $selecciones = [];
                $tipo = 'x';
            } else {
                $inscription = Inscription::whereId($data['bet_id'])->first();

                if ($inscription) {
                    $career_id = $inscription["career_id"];

                    $exists2 = Selection::whereSample($career_id)
                    ->where('player_id', $player->id)
                    ->where(function ($query) {
                        $query->where('ticket_id', '0')
                              ->orWhere('ticket_id', '')
                              ->orWhere('ticket_id', null);
                    })
                    ->get();

                    if (count($exists2) > 0) {
                        $status = "info";
                        $mstatus = "Ya tiene una jugada seleccionada para esta carrera";
                    } else {
                        $selection = new Selection;
                        $selection->select_id = $data['bet_id'];
                        $selection->sample = $career_id;
                        $selection->type = '7';
                        $selection->value = '1';
                        $selection->category_id = '7';  
                        $selection->ticket_id = null;                        

                        $player->selections()->save($selection);

                        $status = "success";
                        $mstatus = "Jugada seleccionada";
                    } 
                }                
            }                          
        }

        if ($tipo != 'x') {
            $selections = Selection::where('player_id', $player->id)
            ->where(function ($query) {
                $query->where('ticket_id', '0')
                      ->orWhere('ticket_id', '')
                      ->orWhere('ticket_id', null);
            })
            ->with('career')
            ->get();

            $i = 0;

            foreach ($selections as $sel) {
                if (($sel->career->posttime) <= date("Y-m-d H:i:s")) {
                    $sel->delete();
                } else {
                    $oins = Inscription::whereId($sel->select_id)->first();

                    $selecciones[$i]['id'] = $sel->id;
                    $selecciones[$i]['numero'] = $oins->number;
                    $selecciones[$i]['horse'] = $oins->horse->name;
                    $selecciones[$i]['carrera'] = $sel->career->number;
                    $selecciones[$i]['hipodromo'] = $sel->career->racecourse->name;
                    $selecciones[$i]['fecha_hora'] = $sel->career->posttime;
                }
                $i++; 
            }            
        }

        return $this->successResponse([
            "status" => $status,
            "mstatus" => $mstatus,
            'selections' => $selecciones
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
                'titulo' => 'Changelogs',
                'icono' => 'fas fa-laptop-code',
                'data' => 'Ir a Changelogs',
                'link' => 'tareas-pendientes'
            );

            $o++;

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
                'titulo' => 'Depósitos',
                'icono' => 'fas fa-stream',
                'data' => 'Ir a página de historial de depósitos',
                'link' => 'depositos'
            );

            $menu[7] = array(
                'titulo' => 'Transacciones',
                'icono' => 'fas fa-file-invoice',
                'data' => 'Ir a transacciones',
                'link' => 'transacciones'
            );

            $menu[8] = array(
                'titulo' => 'Estadísticas',
                'icono' => 'fa fa-percent',
                'data' => 'Ir a Estadísticas',
                'link' => 'estadisticas'
            );

             $menu[9] = array(
                'titulo' => 'Resultados',
                'icono' => 'fas fa-flag-checkered',
                'data' => 'Ir a Resultados',
                'link' => 'ver-resultados'
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

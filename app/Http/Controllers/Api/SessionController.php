<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends ApiController {
    public function loadSelections() {
        $user = Auth::user();
        $player = $user->player;
        $selections = $player->selections;

        return $this->successResponse([
            'selections' => $selections
        ], 200);
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

<?php

namespace App\Http\Controllers\General;

use App\Category;
use App\Game;
use App\League;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;

class GeneralController extends ApiController {
    public function __construct() {
        $this->middleware('guest');
    }

    public function hora() {
    	$fecha = date("Y-m-d H:i:s");
    	
        return $this->successResponse([
            'fecha' => $fecha
        ], 200);
    }

    public function showGamesByCategory() {        
        $category = Category::get();

        for ($i=0; $i < count($category); $i++) { 
            $juegos = 0;
            $juegos = Game::where('games.id', '>', 1)
            ->where('leagues.category_id', $category[$i]['id'])
            ->join('leagues', 'games.league_id', '=', 'leagues.id')
            ->select('games.*')
            ->count();

            $category[$i]['juegos'] = $juegos;
        }

        return $this->successResponse([
            'categories' => $category
        ], 200);
    }

    public function GamesByCategory($id) {

        // $juegos = Game::where('games.id', '>', 1)
        // ->where('leagues.category_id', $id)
        // ->join('leagues', 'games.league_id', '=', 'leagues.id')
        // ->select('games.*','leagues.name','leagues.country_id')
        // ->with('competitors')
        // ->get();

        $juegos = League::whereHas('games', function ($query) {
                            $query->where('id', '>', 25);
                        })
                        ->with(["games" => function($q){
                            $q->with('competitors');
                        }])
                        ->where('leagues.category_id', $id)
                        ->get();



        return $this->successResponse([
            'juegos' => $juegos
        ], 200);
    }
}

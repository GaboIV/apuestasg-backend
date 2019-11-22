<?php

namespace App\Http\Controllers\General;

use App\Category;
use App\Game;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\League;
use Illuminate\Support\Facades\DB;

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

        $daynow = date("Y-m-d H:i:s");
        $fecha_manana = date_create($daynow);
        date_add($fecha_manana, date_interval_create_from_date_string('1 days'));
        $fecha_manana = date_format($fecha_manana, 'Y-m-d H:i:s');

        for ($i=0; $i < count($category); $i++) { 
            $juegos = 0;
            $juegos = Game::where('games.start', '>=', date("Y-m-d H:i"))
            ->where('games.start', '<=', $fecha_manana)
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
        $daynow = date("Y-m-d H:i:s");
        $fecha_manana = date_create($daynow);
        date_add($fecha_manana, date_interval_create_from_date_string('1 days'));
        $fecha_manana = date_format($fecha_manana, 'Y-m-d H:i:s');

        $juegos = League::whereHas('games', function ($query) use ($fecha_manana) {
                            $query->where('start', '>=', date("Y-m-d H:i:s"));
                            $query->where('start', '<=', $fecha_manana);
                        })
                        ->with(["games" => function($q) use ($fecha_manana) {
                            $q->with('competitors');
                            $q->where('start', '>=', date("Y-m-d H:i:s"));
                            $q->where('start', '<=', $fecha_manana);
                        }])
                        ->where('leagues.category_id', $id)
                        ->get();



        return $this->successResponse([
            'juegos' => $juegos
        ], 200);
    }

    public function GamesOutstanding() {
        $daynow = date("Y-m-d H:i:s");
        $fecha_manana = date_create($daynow);
        date_add($fecha_manana, date_interval_create_from_date_string('7 days'));
        $fecha_manana = date_format($fecha_manana, 'Y-m-d H:i:s');

        // $juegos = League::whereHas('games', function ($query) use ($fecha_manana) {
        //                     $query->where('start', '>=', date("Y-m-d H:i:s"));
        //                     $query->where('start', '<=', $fecha_manana);
        //                 })
        //                 ->with(["games" => function($q) use ($fecha_manana) {
        //                     $q->with('competitors');
        //                     $q->where('start', '>=', date("Y-m-d H:i:s"));
        //                     $q->where('start', '<=', $fecha_manana);
        //                 }])
        //                 ->where('leagues.category_id', $id)
        //                 ->get();

        $destacados = DB::table('games') 
            ->where('start', '>=', date("Y-m-d H:i:s"))
            ->where('start', '<=', $fecha_manana)  
            ->whereOutstanding(true)
            ->limit(12)  
            ->get();

        foreach ($destacados as $dest) {
            $dest->league = DB::table('leagues') 
                            ->whereId($dest->league_id)
                            ->first();

            $dest->competitors = DB::table('competitors') 
                            ->whereGameId($dest->id)
                            ->join('teams', 'teams.id', '=', 'competitors.team_id')
                            ->select('competitors.*','teams.name')
                            ->get();

            foreach ($dest->competitors as $comp) {
                $file = storage_path("app/teams/" . $comp->team_id . ".png");

                if(!file_exists($file)) {
                    $comp->image = "noimage.png";
                } else {
                    $comp->image = $comp->team_id . ".png";
                }
            }

            $file = storage_path("app/games/" . $dest->id . ".jpg");

            if(!file_exists($file)) {
                $dest->image = null;
            } else {
                $dest->image = $dest->id . ".png";
            }
        }

        return $this->successResponse([
            'outstanding' => $destacados
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\General;

use App\Category;
use App\Game;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends ApiController {
    public function __construct() {
        $this->middleware('guest')->except('getChangelog');
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
        $mananna = $fecha_manana;
        $fecha_manana = date_format($fecha_manana, 'Y-m-d H:i:s');

        $liga_name = "XYrRTTEddef3";
        $liga_date = "XYrRTRdfsgg3";

        $juegos = Game::where('start', '>=', date("Y-m-d H:i:s"))
        ->where('start', '<=', $fecha_manana)
        ->with('competitors')
        ->with('league')
        ->whereHas('league', function ($query) use ($id) {
            $query->where('category_id', $id);
            $query->orderBy('importance', 'desc');
        })
        ->orderBy('league_id', 'desc')
        ->orderBy('start', 'asc')
        // ->orderBy('league.importance', 'desc')
        ->orderBy('id', 'desc')
        ->get();

        foreach ($juegos as $juego) {
            if ($juego->league_id != $liga_name){
                $liga_name = $juego->league_id;
                $juego['league_name'] = $juego->league->name;
            }

            if ((date('d', strtotime($juego->start)) - date('d') == 1) && $juego->league_id != $liga_date) {
                $juego['manana'] = true;
                $liga_date = $juego->league_id;
            }    

            if (count($juego->competitors) == 2)
            $juego['encuentro'] = $juego->competitors[0]['team']['name'] . " vs " . $juego->competitors[1]['team']['name'];
            elseif (count($juego->competitors) == 3)
                $juego['encuentro'] = $juego->competitors[0]['team']['name'] . " vs " . $juego->competitors[2]['team']['name'];        
        }

        

        return $this->successResponse([
            'juegos' => $juegos
        ], 200);
    }

    public function GamesBySearch(Request $request) {
        $daynow = date("Y-m-d H:i:s");
        $data = $request->all();

        $liga_name = "XYrRTTEddef3";

        $criterios = explode(" ", $data['name']);

        $juegos = Game::where('start', '>=', date("Y-m-d H:i:s"))
        ->with('competitors')
        ->with('league')
        ->whereHas('competitors.team', function ($queryC) use ($criterios) {

                foreach($criterios as $keyword) {
                    $queryC->Where('name', 'LIKE', "%$keyword%");
                }
           
        })
        ->orderBy('league_id', 'desc')
        ->orderBy('start', 'asc')
        ->orderBy('id', 'desc')
        ->paginate(50);

        foreach ($juegos as $juego) {
            if ($juego->league_id != $liga_name){
                $liga_name = $juego->league_id;
                $juego['league_name'] = $juego->league->name;
            }

            if (count($juego->competitors) == 2)
                $juego['encuentro'] = $juego->competitors[0]['team']['name'] . " vs " . $juego->competitors[1]['team']['name'];
            elseif (count($juego->competitors) == 3)
                $juego['encuentro'] = $juego->competitors[0]['team']['name'] . " vs " . $juego->competitors[2]['team']['name'];  
        }

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

        // $destacados = DB::table('games') 
        //     ->where('start', '>=', date("Y-m-d H:i:s"))
        //     ->where('start', '<=', $fecha_manana)  
        //     ->whereOutstanding(true)
        //     ->limit(12)  
        //     ->get();

        $destacados = Game::where('start', '>=', date("Y-m-d H:i:s"))
        ->whereOutstanding(true)
        ->with('competitors')
        ->with('league')
        ->limit(12)  
        ->get();
        

        foreach ($destacados as $dest) {
            foreach ($dest->competitors as $comp) {
                $file = storage_path("app/teams/" . $comp->team_id . ".png");

                if(!file_exists($file)) {
                    $comp->image = "noimage.png";
                } else {
                    $comp->image = $comp->team_id . ".png";
                }
            }

            if (count($dest->competitors) == 2)
                $dest['encuentro'] = $dest->competitors[0]['team']['name'] . " vs " . $dest->competitors[1]['team']['name'];
            elseif (count($dest->competitors) == 3)
                $dest['encuentro'] = $dest->competitors[0]['team']['name'] . " vs " . $dest->competitors[2]['team']['name']; 

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

    public function imageUploadPost(Request $request) {
        $data = $request->all();
  
        $imageName = $data['id'].'.png'; 
   
        $request->image->move(storage_path('app/' . $data['model']), $imageName); 
        
        return $this->successResponse([
            'image' => $imageName
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\General;

use App\Bank;
use App\Game;
use App\Career;
use App\League;
use App\Account;
use App\Category;
use App\Racecourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\CareerResource;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\RacecourseResource;
use Symfony\Component\Console\Input\Input;

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
            if ($category[$i]['id'] == 7) {
                $juegos = 0;
                $juegos = Career::where('date', '>=', date("Y-m-d"))->where('posttime', '>=', $daynow)->count();
            } else {
                $juegos = 0;
                $juegos = Game::where('games.start', '>=', date("Y-m-d H:i"))
                ->where('games.start', '<=', $fecha_manana)
                ->where('leagues.category_id', $category[$i]['id'])
                ->join('leagues', 'games.league_id', '=', 'leagues.id')
                ->select('games.*')
                ->count();
            }            

            $category[$i]['juegos'] = $juegos;
        }

        return $this->successResponse([
            'categories' => $category
        ], 200);
    }

    public function GamesByCategory($id, Request $request) {
        $daynow = date("Y-m-d H:i:s");
        $fecha_manana = date_create($daynow);
        date_add($fecha_manana, date_interval_create_from_date_string('1 days'));
        $mananna = $fecha_manana;
        $fecha_manana = date_format($fecha_manana, 'Y-m-d H:i:s');

        $liga_name = "XYrRTTEddef3";
        $liga_date = "XYrRTRdfsgg3";

        $q = Game::where('start', '>=', date("Y-m-d H:i:s"));
        if ($request->radio == '24') {
            $q->where('start', '<=', $fecha_manana);
        } elseif ($request->radio == 'today') {
            $q->where('start', '<=',date("Y-m-d") . " 23:59");
        }
        
        $juegos = $q->with('competitors')
        ->with(array('league' => function($query) {
            $query->orderBy('importance', 'DESC');
        }))
        ->whereHas('league', function ($query) use ($id) {
            $query->where('category_id', $id);
            $query->orderBy('importance', 'desc');
        })
        ->join('leagues', 'games.league_id', '=', 'leagues.id')
        ->select('games.*', 'leagues.name', 'leagues.importance')
        ->orderBy('leagues.importance', 'desc')
        ->orderBy('league_id', 'desc')
        ->orderBy('start', 'asc')
        
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

    public function getAccounts() {
        $accounts = Account::get();

        return $this->successResponse([
            'accounts' => $accounts
        ], 200);
    }

    public function getBanks() {
        $banks = Bank::orderBy('name')->get();

        return $this->successResponse([
            'banks' => $banks
        ], 200);
    }

    public function getCareers($id) {
        $i = 0;
        $indice = '';
        $indice2 = '';
        $carreras = [];
        $fecha_for_1 = date("Y-m-d H:i:s");
        $fecha = [];

        $query = Career::orderBy('racecourse_id', 'Desc');

        $query->where('date', '>=', date("Y-m-d"))->where('posttime', '>=', $fecha_for_1);

        $query->with('inscriptions');

        if ($id != 'todas') {
            $query->whereRacecourseId($id);
        }

        
        $careers = Cache::remember('careers' . '_' . $id, 60, function () use ($query, $indice, $indice2, $i) {
            $careers = $query->get();   
            
            foreach ($careers as $car) {   
                $carreras[] = $car;       
                if ($car->racecourse->id != $indice OR ((new \DateTime($car->date . " " . $car->time))->diff(new \DateTime($indice2))->days > 0)) {
                    $indice = $car->racecourse->id;
                    $indice2 = $car->date;
    
                    $carreras[$i]['div'] = $car->racecourse->name." > ".$car->date;
    
                    $fecha[] = array(
                        'dia' => $car->dia,
                        'hip' => $car->racecourse->id
                     );
                }
                $i++;
            }

            return $this->successResponse([
                'status' => 'correcto',
                'carreras' => CareerResource::collection($carreras),
                // 'carreras' => $carreras,
                'dias' => $fecha,
                'time' => date("Y-m-d H:i:s"),
            ], 200);
        });
        
        return $careers;
        
    }

    public function getRacecourses() {
        $i = 0;
        $indice = '';
        $indice2 = '';
        $carreras = [];
        $fecha_for_1 = date("Y-m-d H:i:s");
        $fecha = [];        

        $value = Cache::remember('users', 60, function () use ($fecha_for_1) {
            return Racecourse::whereHas('careers', function (Builder $query) use ($fecha_for_1) {
                        $query->where('date', '>=', date("Y-m-d"))->where('posttime', '>=', $fecha_for_1);
                    })
                    ->withCount([
                        'careers' => function ($query) use ($fecha_for_1) {
                            $query->where('date', '>=', date("Y-m-d"))->where('posttime', '>=', $fecha_for_1);
                    }])
                    ->get();
        });

        return RacecourseResource::collection($value);  
    }   
}

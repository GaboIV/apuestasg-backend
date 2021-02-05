<?php

namespace App\Http\Controllers\General;

use App\Bank;
use App\Game;
use App\Career;
use App\League;
use App\Account;
use App\BetType;
use App\Category;
use App\Racecourse;
use App\MatchStructure;
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
            'fecha' => strtotime($fecha)
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
        
        $juegos = $q->with('competitors.bet_type')
        ->with(array('league.country' => function($query) {
            $query->orderBy('importance', 'DESC');
        }))
        ->with('teams.country')
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
        ->with('league.country')
        ->whereHas('teams', function ($queryC) use ($criterios) {
            foreach($criterios as $keyword) {
                $queryC->Where('name', 'LIKE', "%$keyword%");
                $queryC->orWhere('name_id', 'LIKE', "%$keyword%");
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

        $destacados = Game::where('start', '>=', date("Y-m-d H:i:s"))
        ->whereOutstanding(true)
        ->with('competitors.bet_type')
        ->with('league')
        ->with('teams.country')
        ->limit(15)
        ->orderBy('start', 'asc')  
        ->get();

        return $this->successResponse([
            'outstanding' => $destacados
        ], 200);
    }

    public function GamesByLeague($id) 
    {
        $league = League::whereId($id)->with('category')->first(['id', 'name', 'category_id']);

        $structure = MatchStructure::whereCategoryId($league->category_id)->wherePrincipal(1)->first();

        $bet_types = BetType::whereIn('id', $structure->main_bet_types)->get();

        $games = Game::where('start', '>=', date("Y-m-d H:i:s"))
                 ->with(['competitors' => function ($query) use ($structure) {
                     $query->whereIn('bet_type_id', $structure->main_bet_types)
                     ->orderBy('bet_type_id', 'asc')
                     ->orderBy('code', 'asc')
                     ->select('id', 'code', 'data', 'bet_type_id', 'game_id');
                 }])
                 ->with(['teams' => function ($query) {
					 $query->select('id', 'name', 'image_link');
				 }])
                 ->whereLeagueId($id)
                 ->orderBy('start', 'asc')  
                 ->limit(50)
                 ->select('id', 'start', 'league_id', 'teams_id')
                 ->get();


        
        foreach ($games as $key => $game) {
        	$options = [];

        	foreach ($structure->main_bet_types as $type) {
        		$options_temp = [];

        		foreach ($game->competitors as $key => &$competitor) {
        			if ($competitor->bet_type_id == $type) {
        				if (count($options_temp) == 0) {
        					$competitor->selected = true;
        				} else {
        					$competitor->selected = false;
        				}

        				$options_temp[] = $competitor;
        			}
        		}

        		// $bet_types_name = $bet_types->where('id', $type)->first()->name;

        		if (count($options_temp) > 1) {
        			$options[] = $options_temp;
        		} else {
        			$options[] = $options_temp;
        		}
        	}

        	unset($game->competitors);
        	$game->options = $options;
        }
        

        return $this->successResponse([
            'league_id' => $id,
            'name' => $league->name,
            'category' => $league->category,
            'games' => $games
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

        $query = Career::orderBy('racecourse_id', 'Desc')->orderBy('posttime', 'asc');

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
                    ->with([
                        'careers' => function ($query) use ($fecha_for_1) {
                            $query->where('date', '>=', date("Y-m-d"))->where('posttime', '>=', $fecha_for_1);
                    }])
                    ->get();
        });

        return RacecourseResource::collection($value);  
    }   
}

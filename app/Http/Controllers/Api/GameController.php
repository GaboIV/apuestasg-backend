<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class GameController extends ApiController
{
    public function index() {
        $games = Game::orderBy('start', 'desc')
                     ->with(["competitors" => function($q) {
                            $q->with('team');
                        }])
                     ->with(["league" => function($q) {
                            $q->with('category');
                        }])
                     ->paginate(30);

        return $this->successResponse([
            'games' => $games
        ], 200);
    }

    public function updateOutstanding($id, Request $request) {
        if ($request->has('outstanding')) {
            $game = Game::find($id);

            $game->outstanding = $request->outstanding;

            $game->save();
        }

        return $this->successResponse([
            'games' => $game
        ], 200);
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

    public function byFilters(Request $request) {
        $data = $request->all();

        $query = Game::with('league.category')->with('competitors');

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

        $games = $query->paginate(50);

        return $this->successResponse([
            'games' => $games
        ], 200);
    }
}

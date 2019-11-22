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
}

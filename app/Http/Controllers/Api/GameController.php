<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class GameController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function create()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

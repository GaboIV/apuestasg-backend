<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LeagueRequest;
use App\League;
use Illuminate\Http\Request;

class LeagueController extends ApiController {

    public function index() {
        $leagues = League::orderBy('id', 'desc')
                              ->paginate(30);

        return $this->successResponse([
            'leagues' => $leagues
        ], 200);
    }

    public function store(LeagueRequest $request) {
        $data = $request->all();
        
        $league = League::create($data);

        return $this->successResponse([
            'liga' => $league
        ], 200);
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

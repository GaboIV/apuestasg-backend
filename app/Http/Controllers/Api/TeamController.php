<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends ApiController {

    public function index() {
        $teams = Team::orderBy('id', 'desc')
                     ->with('leagues')
                     ->paginate(30);

        return $this->successResponse([
            'teams' => $teams
        ], 200);
    }

    public function store(Request $request)
    {
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

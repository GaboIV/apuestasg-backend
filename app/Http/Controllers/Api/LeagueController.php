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
        $data = $request->all();

        $team = League::whereId($id)
            ->update($data);

        return $this->successResponse([
            'status' => 'success'
        ], 200);
    }

    public function byCategory(Request $request) {
        $data = $request->all();

        $query = League::where('name', '!=', null);

        if (isset($request['category_id']) && $request['category_id'] != 0) {
            $query->whereCategoryId($request['category_id']);
        }

        if (isset($request['country_id']) && $request['country_id'] != 0) {
            $query->whereCountryId($request['country_id']);
        }

        $leagues = $query->get();

        return $this->successResponse([
            'ligas' => $leagues
        ], 200);
    }

    public function destroy($id) {
        //
    }
}

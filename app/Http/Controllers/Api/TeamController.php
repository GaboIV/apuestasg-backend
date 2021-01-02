<?php

namespace App\Http\Controllers\Api;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Builder;

class TeamController extends ApiController {

    public function index() {
        $criterios = explode(" ", request()->criterio);

        $query_teams = Team::with('leagues')
        ->where(function($query) use($criterios){
            if (request()->criterio != 'todos') {
                foreach($criterios as $keyword) {
                    $query->orWhere('name', 'LIKE', "%$keyword%");
                    $query->orWhere('name_id', 'LIKE', "%$keyword%");
                }
            }                    
        })->orderBy('id', 'desc');

        if (request()->league_id != 'todas') {
            $league_id = request()->league_id;

            $query_teams->whereHas('leagues', function (Builder $query) use ($league_id) {
                $query->where('leagues.id', $league_id);
            });
        }
        
        $teams = $query_teams->paginate(25);

        return $this->successResponse([
            'teams' => $teams
        ], 200);
    }

    public function byLeague($id) {
        $teams = Team::whereHas('leagues', function ($query) use ($id) {               
                        $query->where('league_id', $id);
                    })
                    ->get();

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
        $data = $request->all();

        $team = Team::whereId($id)
            ->update($data);

        return $this->successResponse([
            'status' => 'success'
        ], 200);
    }

    public function destroy($id) {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends ApiController {

    public function index() {
        $criterios = explode(" ", request()->criterio);

        $teams = Team::where(function($query) use($criterios){
                    if (request()->criterio != 'todos') {
                        foreach($criterios as $keyword) {
                            $query->orWhere('name', 'LIKE', "%$keyword%");
                            $query->orWhere('name_id', 'LIKE', "%$keyword%");
                        }
                    }                    
                })
                ->orderBy('id', 'desc')
                ->with('leagues')
                ->paginate(25);

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

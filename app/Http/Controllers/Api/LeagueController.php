<?php

namespace App\Http\Controllers\Api;

use App\League;
use Illuminate\Http\Request;
use App\Http\Requests\LeagueRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Builder;

class LeagueController extends ApiController 
{
    public function index() 
    {
        $criterios = explode(" ", request()->criterio);

        $leagues = League::where(function($query) use($criterios){
                    if (request()->criterio != 'todas') {
                        foreach($criterios as $keyword) {
                            $query->orWhere('name', 'LIKE', "%$keyword%");
                            $query->orWhere('name_uk', 'LIKE', "%$keyword%");
                            $query->orWhere('description', 'LIKE', "%$keyword%");
                            $query->orWhereHas('country', function (Builder $query) use ($keyword) {
                                $query->where('name', 'LIKE', "%$keyword%");
                            });
                        }
                    }                    
                })
                ->orderBy('id', 'desc')
                ->paginate(25);

        return $this->successResponse([
            'leagues' => $leagues
        ], 200);
    }

    public function store(LeagueRequest $request) 
    {
        $data = $request->all();
        
        $league = League::create($data);

        return $this->successResponse([
            'liga' => $league
        ], 200);
    }

    public function show($id) 
    {
    }

    public function update(Request $request, $id) 
    {
        $data = $request->all();

        $team = League::whereId($id)
            ->update($data);

        return $this->successResponse([
            'status' => 'success'
        ], 200);
    }

    public function byCategory(Request $request) 
    {
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

    public function destroy($id) 
    {
    }
}

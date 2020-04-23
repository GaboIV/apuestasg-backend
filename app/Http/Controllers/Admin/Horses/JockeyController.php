<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Jockey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class JockeyController extends ApiController {
    public function index() {
        $criterios = explode(" ", request()->criterio);

        $jockeys = Jockey::orderBy('name', 'asc')
        ->where(function($query) use($criterios){
            if (request()->criterio != 'todos') {
                foreach($criterios as $keyword) {
                    $query->orWhere('name', 'LIKE', "%$keyword%");
                }
            }                    
        })
        ->paginate('50');

        return $this->successResponse([
            'status' => 'correcto',
            'jockeys' => $jockeys,
            'time' => date("Y-m-d H:i:s")
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

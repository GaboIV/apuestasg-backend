<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class TrainerController extends ApiController {
    public function index() {
        $criterios = explode(" ", request()->criterio);

        $trainers = Trainer::orderBy('name', 'asc')
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
            'trainers' => $trainers,
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

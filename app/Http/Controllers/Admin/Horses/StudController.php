<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Stud;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class StudController extends ApiController {
    public function index() {
        $criterios = explode(" ", request()->criterio);

        $studs = Stud::orderBy('name', 'asc')
        ->where(function($query) use ($criterios) {
            if (request()->criterio != 'todos') {
                foreach($criterios as $keyword) {
                    $query->orWhere('name', 'LIKE', "%$keyword%");
                }
            }                    
        })
        ->paginate('50');

        // foreach ($studs as $stud) {
        //     $file = storage_path("app/studs/" . $stud->id . ".png");

        //     if(file_exists(storage_path("app/studs/" . $stud->id . ".png"))) {
        //         File::copy(storage_path("app/studs/" . $stud->id . ".png"), storage_path("app/studs_name/" . $stud->name . ".png"));
        //     }
        // }

        return $this->successResponse([
            'status' => 'correcto',
            'studs' => $studs,
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

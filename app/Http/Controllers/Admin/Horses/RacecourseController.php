<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Racecourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class RacecourseController extends ApiController{
    public function index() {
        $racecourses = Racecourse::orderBy('name', 'asc')
                    ->get();

        return $this->successResponse([
            'status' => 'correcto',
            'hipodromos' => $racecourses,
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

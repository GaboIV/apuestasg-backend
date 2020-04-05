<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Haras;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class HarasController extends ApiController {
    public function index() {
        $haras = Haras::orderBy('name', 'asc')
                    ->get();

        return $this->successResponse([
            'status' => 'correcto',
            'haras' => $haras,
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

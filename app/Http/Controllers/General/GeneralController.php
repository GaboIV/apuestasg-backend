<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;

class GeneralController extends ApiController {
    public function __construct() {
        $this->middleware('guest');
    }

    public function hora() {
    	$fecha = date("Y-m-d H:i:s");
    	
        return $this->successResponse([
            'fecha' => $fecha
        ], 200);
    }
}

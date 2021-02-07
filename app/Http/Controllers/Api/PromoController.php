<?php

namespace App\Http\Controllers\Api;

use App\Promo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PromoController extends ApiController
{
    public function __construct() {
        $this->middleware('guest')->except('getChangelog');
    }

    public function getNextPromo()
    {
        switch (request()->promo) {
            case 'hourly':
                $promo = Promo::where('group', 'hourly')->where('result', null)->first();
                break;

            default:
                return $this->successResponse([
                    "promo" => null,
                    "message" => "No hay promoción disponible por ahora."
                ], 200);
                break;
        }

        return $this->successResponse([
            "promo" => $promo,
            "message" => "Promoción disponible"
        ], 200);
    }
}

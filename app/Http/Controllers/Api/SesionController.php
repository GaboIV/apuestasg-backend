<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SessionController extends ApiController {
    public function loadSelections() {
        $user = Auth::user();
        $player = $user->player;
        $selections = $player->selections;

        return $this->successResponse([
            'selections' => $selections
        ], 200);
    }
}

<?php

namespace App;

use App\Player;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model {
    public function player() {
        return $this->hasOne(Player::class, 'id', 'player_id');
    }
}

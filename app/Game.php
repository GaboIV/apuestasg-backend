<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    public function competitors() {
        return $this->hasMany('App\Competitor');
    }

    public function league() {
        return $this->hasOne(League::class, 'id', 'league_id');
    }
}

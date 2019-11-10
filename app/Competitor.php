<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    protected $with = ["team"];

    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function team() {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    protected $with = ["team"];

    protected $fillable = [
        'code',
        'game_id',
        'team_id',
        'bet_type_id',
        'odd',
        'link',
        'status'
    ];

    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function team() {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}

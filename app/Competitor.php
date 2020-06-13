<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model {

    protected $fillable = [
        'code',
        'game_id',
        'team_id',
        'bet_type_id',
        'odd',
        'fact',
        'link',
        'status',
        'data',
        'HT',
        'provider'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }
}

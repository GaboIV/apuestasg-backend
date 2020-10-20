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
        'provider',
        'winner'
    ];

    protected $casts = [
        'data' => 'array',
        'winner' => 'array'
    ];

    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function bet_type() {
        return $this->hasOne(BetType::class, 'id', 'bet_type_id');
    }
}

<?php

namespace App;

use App\Game;
use App\Player;
use App\Competitor;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model {

	protected $fillable = [
        'ticket_id', 'player_id'
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function game() {
        return $this->belongsTo(Game::class, 'sample', 'id');
    }

    // public function competitor() {
    //     return $this->belongsTo(Competitor::class, 'select_id', 'id');
    // }
}

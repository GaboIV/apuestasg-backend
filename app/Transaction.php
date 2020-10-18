<?php

namespace App;

use App\EventType;
use App\Player;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	protected $with = ["event"];

    protected $fillable = [
        'event_type_id',
        'ticket_id',
        'player_id',
        'amount',
        'player_balance',
        'user_admin'
    ];

    public function event() {
        return $this->belongsTo(EventType::class, 'event_type_id', 'id');
    }

    public function player() {
        return $this->belongsTo(Player::class);
    }
}

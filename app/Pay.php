<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model {

    protected $with = ["bank", "account"];

    protected $fillable = [
        'code',
        'document',
        'amount',
        'register_date',
        'reference',
        'email',
        'status',
        'player_id',
        'bank_id',
        'account_id'
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function bank() {
        return $this->belongsTo(Bank::class);
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }
}

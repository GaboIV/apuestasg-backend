<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model {
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
}

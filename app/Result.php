<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'result',
        'competitor_id',
        'game_id'
    ];

    protected $casts = [
        'result' => 'array'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'result',
        'category_id',
        'bet_type_id',
        'game_id'
    ];
}

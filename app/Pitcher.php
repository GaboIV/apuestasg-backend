<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitcher extends Model
{
    protected $fillable = [
        'name',
        'era'
    ];
}

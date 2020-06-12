<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetType extends Model
{
    protected $fillable = [       
        'name',
        'description',
        'importance',
        'category_id'
    ];
}

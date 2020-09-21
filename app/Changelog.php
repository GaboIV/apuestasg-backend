<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    protected $fillable = [
        'user_id',
        'text',
        'status',
        'category'
    ];
}

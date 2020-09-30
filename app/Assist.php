<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    protected $fillable = [
        'admin_id',
        'player_id',
        'type',
        'email_sent_player',
        'email_sent_admin',
        'status'
    ];
}

<?php

namespace App;

use App\Selection;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
	protected $appends = ['quot'];

	protected $fillable = [
        'status',
        'towin'
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function selections() {
        return $this->hasMany('App\Selection')
        ->with('game.competitors');
    }

    public function getQuotAttribute() { 
        $quot = 1;
        $selections = $this->selections;
        
        foreach ($selections as $sel) {
        	$odd = explode("/", $sel->value);
            if (!isset($odd[1])) $odd[1] = 1;
            $decimal_odd = (intval($odd[0]) / intval($odd[1])) + 1;
	        
            $quot = $quot * $decimal_odd;
        }       

        return $quot;
    }
}

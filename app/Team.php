<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {
	protected $appends = ['image'];

    protected $fillable = [
        'country_id',
        'name',
        'name_uk'
    ];

    public function leagues() {
       return $this->belongsToMany('\App\League', 'league_team')->withTimestamps();
    }

    public function getImageAttribute() { 
    	$file = storage_path("app/teams/" . $this->id . ".png");

	    if(!file_exists($file)) {
	    	return "noimage.png";
	    } else {
	    	return $this->id.".png";
	    }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {
	protected $appends = ['image', 'image_url'];

    protected $fillable = [
        'country_id',
        'name',
        'name_id',
        'web_id',
        'image'
    ];

    public function leagues() {
       return $this->belongsToMany('\App\League', 'league_team')->withTimestamps();
    }

    public function country() {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function getImageAttribute() { 
    	$file = storage_path("app/teams/" . $this->id . ".png");

	    if(!file_exists($file)) {
	    	return "noimage.png";
	    } else {
	    	return $this->id.".png";
	    }
    }

    public function getImageUrlAttribute() { 
        if ($this->image_link) {
            return $this->image_link;
        } else {
            $file = storage_path("app/teams/" . $this->id . ".png");

            if(!file_exists($file)) {
                return url("api/images/teams/noimage.png");
            } else {
                return url("api/images/teams/". $this->id . ".png");
            }
        }    	
    }
}

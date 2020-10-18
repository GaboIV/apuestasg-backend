<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racecourse extends Model
{
    protected $appends = ['image'];

    protected $fillable = [
        "name",
        "location",
        "acro",
        "origin",
        "url"
    ];

    public function careers() {
        return $this->hasMany('App\Career');
    }

    public function country() {
        return $this->hasOne(Country::class, 'id', 'location');
    }

    public function getImageAttribute() { 
    	$file = storage_path("app/countries/" . $this->location . ".png");

	    if(!file_exists($file)) {
	    	return url("api/images/countries/noimage.png");
	    } else {
	    	return url("api/images/countries/" . $this->location.".png");
	    }
    }
}

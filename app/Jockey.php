<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jockey extends Model {
	protected $appends = ['image'];

	protected $fillable = [
		"name",
		"name_id",
		"country_id"
	];

    public function getImageAttribute() { 
    	$file = storage_path("app/jockeys/" . $this->id . ".png");

	    if(!file_exists($file)) {
	    	return "noimage.png";
	    } else {
	    	return $this->id.".png";
	    }
    }
}

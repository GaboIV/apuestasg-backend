<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stud extends Model {
	protected $appends = ['image'];

    public function getImageAttribute() { 
    	$file = storage_path("app/studs/" . $this->id . ".png");

	    if(!file_exists($file)) {
	    	return "noimage.png";
	    } else {
	    	return $this->id.".png";
	    }
    }
}

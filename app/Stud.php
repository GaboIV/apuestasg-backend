<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stud extends Model {
	protected $appends = ['image'];

    public function getImageAttribute() { 
    	$file = storage_path("app/studs_name/" . $this->name . ".png");

	    if(!file_exists($file)) {			
			return url("/api/images/studs_name/noimage.png");
	    } else {
			return url("/api/images/studs_name/" . $this->name . ".png");
	    }
    }
}

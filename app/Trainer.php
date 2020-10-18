<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
		"name",
		"name_id",
		"country_id"
	];
}

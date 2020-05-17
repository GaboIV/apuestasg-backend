<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racecourse extends Model
{
    public function careers() {
        return $this->hasMany('App\Career');
    }

    public function country() {
        return $this->hasOne(Country::class, 'id', 'location');
    }
}

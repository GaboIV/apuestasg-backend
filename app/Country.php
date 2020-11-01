<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function leagues() {
        return $this->hasMany('App\League');
    }
}

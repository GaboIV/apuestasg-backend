<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model {
    protected $fillable = [
        'name', 'name_uk', 'description', 'url', 'importance', 'country_id', 'category_id'
    ];

    public function games() {
        return $this->hasMany('App\Game');
    }

    public function teams() {
       return $this->belongsToMany('\App\Team', 'league_team')->withTimestamps();
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}

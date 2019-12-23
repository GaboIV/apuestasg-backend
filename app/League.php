<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model {
    protected $appends = ['image'];
    
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

    public function country() {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function getImageAttribute() { 
        $file = storage_path("app/leagues/" . $this->id . ".png");

        if(!file_exists($file)) {
            return "noimage.png";
        } else {
            return $this->id.".png";
        }
    }
}

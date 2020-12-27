<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class MatchStructure extends Model 
{
    
    protected $fillable = [
        'category_id',
        'principal'
    ];

    protected $casts = [
        'principal' => 'boolean',
        'main_bet_types' => 'array'
    ];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}

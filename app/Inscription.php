<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model {
    protected $with = ["stud", "horse", "jockey", "trainer"];

    protected $fillable = [
        'status',
        'horse_id',
        'jockey_id',
        'career_id',
        'trainer_id',
        'number',
        'weight',
        'medicines',
        'implements',
        'position',
        'odd'
    ];

    public function stud() {
        return $this->hasOne(Stud::class, 'id', 'stud_id');
    }

    public function horse() {
        return $this->hasOne(Horse::class, 'id', 'horse_id');
    }

    public function jockey() {
        return $this->hasOne(Jockey::class, 'id', 'jockey_id');
    }

    public function trainer() {
        return $this->hasOne(Trainer::class, 'id', 'trainer_id');
    }
}

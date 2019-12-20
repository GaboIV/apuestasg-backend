<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    protected $appends = ['encuentro'];

	protected $fillable = [
        'web_id',
        'league_id',
        'start',
        'url'
    ];

    public function competitors() {
        return $this->hasMany('App\Competitor');
    }

    public function league() {
        return $this->hasOne(League::class, 'id', 'league_id');
    }

    public function getEncuentroAttribute() { 
        $competitors = $this->competitors;

        if (count($competitors) == 2) { 
            return $competitors[0]['team']['name'] . " vs " . $competitors[1]['team']['name'];
        } elseif (count($competitors) == 3) {
            return $competitors[0]['team']['name'] . " vs " . $competitors[2]['team']['name'];
        } else {
            return null;
        }
    }
}

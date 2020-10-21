<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Game extends Model {

    use HasJsonRelationships;

    protected $appends = ['encuentro', 'image'];

    protected $with = ['teams'];

	protected $fillable = [
        'web_id',
        'league_id',
        'start',
        'url',
        'teams_id',
        'result',
        'description'
    ];

    protected $casts = [
        'teams_id' => 'array'
    ];

    public function competitors() {
        return $this->hasMany('App\Competitor');
    }

    public function league() {
        return $this->hasOne(League::class, 'id', 'league_id');
    }

    public function teams()
    {
        return $this->belongsToJson('App\Team', 'teams_id');
    }

    public function sections() {
        return $this->hasOne(Result::class, 'game_id', 'id');
    }

    // public function getTeamsArrayAttribute() { 
    //     $teams_id =  $this->teams;
    //     $teams = [];

    //     foreach ($teams_id as $key => $team_id) {
    //         $teams[] = Team::whereId($team_id)->first();
    //     }

    //     return $teams;
    // }

    public function getEncuentroAttribute() { 
        $teams =  $this->teams;
        
        if (count($teams) == 2) {
            $name = $teams[0]->name . " vs " . $teams[1]->name;
        }

        return $name ?? "Partido de múltiples equipos";
    }

    public function getImageAttribute() { 
        $file = storage_path("app/games/" . $this->id . ".png");

        if(!file_exists($file)) {
            return "noimage.png";
        } else {
            return $this->id.".png";
        }
    }
}

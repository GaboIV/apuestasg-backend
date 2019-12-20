<?php

namespace App;

use App\Game;
use App\Player;
use App\Competitor;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model {

    protected $appends = ['team_name', 'status'];

	protected $fillable = [
        'ticket_id', 'player_id'
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function game() {
        return $this->belongsTo(Game::class, 'sample', 'id');
    }

    public function getTeamNameAttribute() { 
        $name_selection = null;
        $competitors = $this->game->competitors;
        
        foreach ($competitors as $com) {
            if ($this->select_id == $com->id) {
                $name_selection = $com->team->name;
            }
        }       

        return $name_selection;
    }

    public function getStatusAttribute() { 
        $status_selection = null;
        $competitors = $this->game->competitors;
        
        foreach ($competitors as $com) {
            if ($this->select_id == $com->id) {
                $status_selection = $com->status;
            }
        }       

        return $status_selection;
    }
}

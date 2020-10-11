<?php

namespace App;

use App\Career;
use App\Competitor;
use App\Game;
use App\Inscription;
use App\Player;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model {

    protected $appends = ['team_name', 'status'];

	protected $fillable = [
        'ticket_id', 
        'player_id', 
        'type'
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function game() {
        return $this->belongsTo(Game::class, 'sample', 'id');
    }

    public function career() {
        return $this->belongsTo(Career::class, 'sample', 'id');
    }

    public function inscription() {
        return $this->belongsTo(Inscription::class, 'select_id', 'id');
    }

    public function competitor() {
        return $this->belongsTo(Competitor::class, 'select_id', 'id');
    }

    public function getTeamNameAttribute() { 

        $name_selection = null;

        if ($this->category_id != 7) {
            $competitors = $this->game->competitors;
        
            foreach ($competitors as $com) {
                if ($this->type == 1) {
                    $name_selection = $this->game->teams[0]->name;
                } elseif ($this->type == 2) {
                    $name_selection = $this->game->teams[1]->name;
                } else {
                    $name_selection = "Empate";
                }
            } 
        }
              

        return $name_selection;
    }

    public function getStatusAttribute() { 
        $status_selection = null;
        if ($this->category_id != 7) {
            $competitors = $this->game->competitors;
        
            // foreach ($competitors as $com) {
            //     if ($this->select_id == $com->id) {
            //         $status_selection = $com->status;
            //     }
            // } 
        }
              

        return 0;
    }
}

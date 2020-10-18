<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new Team();
        $team->id = 1;
        $team->name = 'Empate';
        $team->name_uk = 'Draw';
        $team->save();	    
    }
}

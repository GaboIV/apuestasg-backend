<?php

use App\League;
use Illuminate\Database\Seeder;

class LeaguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $league = new League();
        $league->name = 'MLB';
        $league->url = 'http://odds.football-data.co.uk/baseball/major-league-baseball/';
        $league->importance = '100';
        $league->country_id = '226';
        $league->category_id = '2';
        $league->save();
    }
}

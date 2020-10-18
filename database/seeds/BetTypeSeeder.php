<?php

use App\BetType;
use Illuminate\Database\Seeder;

class BetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $league = new BetType();
        $league->id = 1;
        $league->description_web = 'Match Result Fútbol';
        $league->description = 'Match Result Fútbol';
        $league->importance = '100';
        $league->category_id = '1';
        $league->save();

        $league = new BetType();
        $league->id = 2;
        $league->description_web = 'Money Line Béisbol';
        $league->description = 'Money Line Béisbol';
        $league->importance = '100';
        $league->category_id = '2';
        $league->save();

        $league = new BetType();
        $league->id = 3;
        $league->description_web = 'Money Line Baloncesto';
        $league->description = 'Money Line Baloncesto';
        $league->importance = '100';
        $league->category_id = '3';
        $league->save();

        $league = new BetType();
        $league->id = 4;
        $league->description_web = 'Match Result Tenis';
        $league->description = 'Match Result Tenis';
        $league->importance = '100';
        $league->category_id = '4';
        $league->save();

        $league = new BetType();
        $league->id = 5;
        $league->description_web = 'Money Line Fútbol Americano';
        $league->description = 'Money Line Fútbol Americano';
        $league->importance = '100';
        $league->category_id = '5';
        $league->save();

        $league = new BetType();
        $league->id = 6;
        $league->description_web = 'Money Line Hockey';
        $league->description = 'Money Line Hockey';
        $league->importance = '100';
        $league->category_id = '6';
        $league->save();

        $league = new BetType();
        $league->id = 7;
        $league->description_web = 'Money Line Hipismo';
        $league->description = 'Money Line Hipismo';
        $league->importance = '100';
        $league->category_id = '7';
        $league->save();

        $league = new BetType();
        $league->id = 8;
        $league->description_web = 'Match Result Rugby';
        $league->description = 'Match Result Rugby';
        $league->importance = '100';
        $league->category_id = '8';
        $league->save();

        $league = new BetType();
        $league->id = 9;
        $league->description_web = 'Fight Result (Draw No Bet) Boxeo';
        $league->description = 'Fight Result (Draw No Bet) Boxeo';
        $league->importance = '100';
        $league->category_id = '9';
        $league->save();
    }
}

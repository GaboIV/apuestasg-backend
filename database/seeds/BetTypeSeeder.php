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
        $league->description_web = 'Money Line Béisbol';
        $league->description = 'Money Line Béisbol';
        $league->importance = '100';
        $league->category_id = '2';
        $league->save();
    }
}

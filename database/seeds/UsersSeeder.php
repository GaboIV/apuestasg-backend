<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nick = '222222';
        $user->email = '222222@apuestasg.com';
        $user->password = '222222';
        $user->save();
    }
}

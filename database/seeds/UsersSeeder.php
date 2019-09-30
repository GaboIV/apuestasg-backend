<?php

use App\Role;
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
        $role_player = Role::where('name', 'player')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->nick = '222222';
        $user->email = '222222@apuestasg.com';
        $user->password = '222222';
        $user->save();
        $user->roles()->attach($role_player);

        $user = new User();
        $user->nick = 'master';
        $user->email = 'master@apuestasg.com';
        $user->password = '222222';
        $user->save();
        $user->roles()->attach($role_admin);
    }
}

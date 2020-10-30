<?php

use App\Role;
use App\User;
use App\Player;
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
        // $role_player = Role::where('name', 'player')->first();
        // $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->nick = 'gaboiv';
        $user->email = 'gabrielcaraballo1907@gmail.com';
        $user->password = '222222';
        $user->save();
        // $user->roles()->attach($role_player);
 
         // Datos usuario cliente
         $player = new Player;
         $player->user_id = $user->id;
         $player->document_type = 'CED';
         $player->document_number = '19489658';
         $player->name = 'Gabriel';
         $player->lastname = 'Caraballo';
         $player->birthday = '1991-07-19';
         $player->gender = 'M';
         $player->state_id = 2;
         $player->city_id = 8;
         $player->country_id = 231;
         $player->parish_id = 26;
         $player->phone = '04262858771';
         $player->save();

        $user = new User();
        $user->nick = 'master';
        $user->email = 'master@apuestasg.com';
        $user->password = '222222';
        $user->save();
        // $user->roles()->attach($role_admin);

        // Datos usuario cliente
        $player = new Player;
        $player->user_id = $user->id;
        $player->document_type = 'CED';
        $player->document_number = '18594179';
        $player->name = 'Jesús';
        $player->lastname = 'Caraballo';
        $player->birthday = '1987-08-02';
        $player->gender = 'M';
        $player->state_id = 2;
        $player->city_id = 8;
        $player->country_id = 231;
        $player->parish_id = 26;
        $player->phone = '04126969027';
        $player->save();
    }
}

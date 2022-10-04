<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrador',
                'key' => 'admin',
                'guard_name' => 'api',
                'created_at' => '2020-06-09 12:08:56',
                'updated_at' => '2020-06-09 12:08:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Jugador',
                'key' => 'player',
                'guard_name' => 'api',
                'created_at' => '2020-06-09 12:08:56',
                'updated_at' => '2020-08-16 18:00:24',
            ),
        ));
        
        
    }
}
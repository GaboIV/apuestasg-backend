<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configuration')->delete();
        
        \DB::table('configuration')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group' => 'EMAIL',
                'subgroup' => 'REGISTER',
                'value' => 'admin@apuestasg.win',
                'created_at' => '2020-09-23 15:31:51',
                'updated_at' => '2020-09-23 15:31:51',
            ),
        ));
        
        
    }
}
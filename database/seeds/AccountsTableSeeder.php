<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('accounts')->delete();
        
        \DB::table('accounts')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Gabriel Caraballo',
                'number' => '0115-0073-11-1003820138',
                'document' => 'V-19489658',
                'email' => 'gc@apuestasg.com.ve',
                'type' => 'Ahorro',
                'bank_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Gabriel Caraballo',
                'number' => '0105-0090-74-1090323107',
                'document' => 'V-19489658',
                'email' => 'gc@apuestasg.com.ve',
                'type' => 'Ahorro',
                'bank_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Gabriel Caraballo',
                'number' => '0102-0433-01-0000171858',
                'document' => 'V-19489658',
                'email' => 'gc@apuestasg.com.ve',
                'type' => 'Ahorro',
                'bank_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Zaida Moya',
                'number' => '0108-0973-81-010-0051665',
                'document' => 'V-8.838.888',
                'email' => 'zm@apuestasg.com',
                'type' => 'Corriente',
                'bank_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
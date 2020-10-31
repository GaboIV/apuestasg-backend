<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'model_type' => 'App\\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 1,
                'model_type' => 'App\\User',
                'model_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1,
            ),
            3 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 2,
            ),
            4 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 12,
            ),
            5 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 30,
            ),
            6 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 31,
            ),
        ));
        
        
    }
}
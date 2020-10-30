<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_id' => 'soccer',
                'name' => 'Fútbol',
                'acro_3' => 'FUT',
                'data' => NULL,
                'importance' => '94.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name_id' => 'baseball',
                'name' => 'Béisbol',
                'acro_3' => 'BEI',
                'data' => NULL,
                'importance' => '95.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            2 => 
            array (
                'id' => 3,
                'name_id' => 'basketball',
                'name' => 'Baloncesto',
                'acro_3' => 'BAL',
                'data' => NULL,
                'importance' => '90.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name_id' => 'tennis',
                'name' => 'Tenis',
                'acro_3' => 'TEN',
                'data' => NULL,
                'importance' => '85.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            4 => 
            array (
                'id' => 5,
                'name_id' => 'football',
                'name' => 'Fútbol americano',
                'acro_3' => 'FAM',
                'data' => NULL,
                'importance' => '80.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name_id' => 'ice-hockey',
                'name' => 'Hockey',
                'acro_3' => 'HOC',
                'data' => NULL,
                'importance' => '75.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            6 => 
            array (
                'id' => 7,
                'name_id' => '',
                'name' => 'Hipismo',
                'acro_3' => 'HIP',
                'data' => NULL,
                'importance' => '88.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            7 => 
            array (
                'id' => 8,
                'name_id' => 'rugby',
                'name' => 'Rugby',
                'acro_3' => 'RUG',
                'data' => NULL,
                'importance' => '70.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            8 => 
            array (
                'id' => 9,
                'name_id' => 'boxing',
                'name' => 'Boxeo',
                'acro_3' => 'BOX',
                'data' => NULL,
                'importance' => '67.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            9 => 
            array (
                'id' => 10,
                'name_id' => '',
                'name' => 'MMA / UFC',
                'acro_3' => 'MMA',
                'data' => NULL,
                'importance' => '65.00',
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
        ));
        
        
    }
}
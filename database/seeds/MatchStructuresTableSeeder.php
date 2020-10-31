<?php

use Illuminate\Database\Seeder;

class MatchStructuresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('match_structures')->delete();
        
        \DB::table('match_structures')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 4,
                'division_number' => 3,
                'division_name_singular' => 'set',
                'division_name_plural' => 'sets',
                'annotation_name_singular' => 'punto',
                'annotation_name_plural' => 'puntos',
                'principal' => 1,
                'halftime' => 0,
                'type' => 'big',
                'created_at' => '2020-10-09 05:03:48',
                'updated_at' => '2020-10-09 05:03:48',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 4,
                'division_number' => 5,
                'division_name_singular' => 'set',
                'division_name_plural' => 'sets',
                'annotation_name_singular' => 'punto',
                'annotation_name_plural' => 'puntos',
                'principal' => 0,
                'halftime' => 0,
                'type' => 'big',
                'created_at' => '2020-10-09 05:03:48',
                'updated_at' => '2020-10-09 05:03:48',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 2,
                'division_number' => 9,
                'division_name_singular' => 'entrada',
                'division_name_plural' => 'entradas',
                'annotation_name_singular' => 'carrera',
                'annotation_name_plural' => 'carreras',
                'principal' => 1,
                'halftime' => 1,
                'type' => 'sum',
                'created_at' => '2020-10-09 05:56:06',
                'updated_at' => '2020-10-09 05:56:06',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 1,
                'division_number' => 2,
                'division_name_singular' => 'tiempo',
                'division_name_plural' => 'tiempos',
                'annotation_name_singular' => 'gol',
                'annotation_name_plural' => 'goles',
                'principal' => 1,
                'halftime' => 1,
                'type' => 'sum',
                'created_at' => '2020-10-09 05:56:06',
                'updated_at' => '2020-10-09 05:56:06',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 3,
                'division_number' => 4,
                'division_name_singular' => 'cuarto',
                'division_name_plural' => 'cuartos',
                'annotation_name_singular' => 'punto',
                'annotation_name_plural' => 'puntos',
                'principal' => 1,
                'halftime' => 2,
                'type' => 'sum',
                'created_at' => '2020-10-09 05:56:06',
                'updated_at' => '2020-10-09 05:56:06',
            ),
        ));
        
        
    }
}
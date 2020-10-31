<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('players')->delete();
        
        \DB::table('players')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'document_type' => 'CED',
                'document_number' => '1',
                'name' => 'Gabriel',
                'lastname' => 'Caraballo',
                'birthday' => '1991-07-19',
                'gender' => 'M',
                'country_id' => 231,
                'state_id' => 2,
                'city_id' => 8,
                'parish_id' => 26,
                'address' => NULL,
                'phone' => '04260000000',
                'treatment' => 'Sr.',
                'available' => '100000.00',
                'risk' => '0.00',
                'points' => '0.00',
                'language_id' => 0,
                'timezone' => '',
                'format_quot' => '0',
                'offer' => 0,
                'ip' => NULL,
                'browser' => NULL,
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'document_type' => 'CED',
                'document_number' => '2',
                'name' => 'Jesús',
                'lastname' => 'Caraballo',
                'birthday' => '1987-08-02',
                'gender' => 'M',
                'country_id' => 231,
                'state_id' => 2,
                'city_id' => 8,
                'parish_id' => 26,
                'address' => 'Av. José Antonio Anzoátegui, Local Galpón Comerciál NRO. A-H, Sector Viento Fresco, Anaco, Edo. Anzoátegui.',
                'phone' => '04120000000',
                'treatment' => 'Sr.',
                'available' => '2000000.00',
                'risk' => '0.00',
                'points' => '0.00',
                'language_id' => 1,
                'timezone' => 'America/Caracas',
                'format_quot' => '1',
                'offer' => 0,
                'ip' => NULL,
                'browser' => NULL,
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2020-10-11 14:49:35',
            ),
            2 => 
            array (
                'id' => 11,
                'user_id' => 12,
                'document_type' => 'V',
                'document_number' => '24037273',
                'name' => 'simon',
                'lastname' => 'rivas',
                'birthday' => '1994-10-22',
                'gender' => 'F',
                'country_id' => 231,
                'state_id' => NULL,
                'city_id' => NULL,
                'parish_id' => NULL,
                'address' => NULL,
                'phone' => '04249477368',
                'treatment' => 'Sr.',
                'available' => '100000.00',
                'risk' => '0.00',
                'points' => '0.00',
                'language_id' => 1,
                'timezone' => 'America/Caracas',
                'format_quot' => '1',
                'offer' => 0,
                'ip' => '186.90.90.25',
                'browser' => NULL,
                'created_at' => '2020-06-23 20:17:34',
                'updated_at' => '2020-06-23 20:17:34',
            ),
            3 => 
            array (
                'id' => 29,
                'user_id' => 30,
                'document_type' => 'V',
                'document_number' => '19489658',
                'name' => 'Gabriel Eduardo',
                'lastname' => 'Caraballo Moya',
                'birthday' => '1991-07-18',
                'gender' => 'F',
                'country_id' => 231,
                'state_id' => NULL,
                'city_id' => NULL,
                'parish_id' => NULL,
                'address' => NULL,
                'phone' => '04262858771',
                'treatment' => 'Sr.',
                'available' => '0.00',
                'risk' => '0.00',
                'points' => '0.00',
                'language_id' => 1,
                'timezone' => 'America/Caracas',
                'format_quot' => '1',
                'offer' => 0,
                'ip' => '200.121.132.115',
                'browser' => NULL,
                'created_at' => '2020-09-30 14:45:03',
                'updated_at' => '2020-10-20 21:35:48',
            ),
            4 => 
            array (
                'id' => 30,
                'user_id' => 31,
                'document_type' => 'V',
                'document_number' => '19774518',
                'name' => 'Carmen Saraí',
                'lastname' => 'Bompart Marcano',
                'birthday' => '1991-08-21',
                'gender' => 'F',
                'country_id' => 231,
                'state_id' => NULL,
                'city_id' => NULL,
                'parish_id' => NULL,
                'address' => NULL,
                'phone' => '04121842736',
                'treatment' => 'Srta.',
                'available' => '200000.00',
                'risk' => '0.00',
                'points' => '0.00',
                'language_id' => 1,
                'timezone' => 'America/Caracas',
                'format_quot' => '1',
                'offer' => 0,
                'ip' => '200.121.132.115',
                'browser' => NULL,
                'created_at' => '2020-10-01 05:45:07',
                'updated_at' => '2020-10-01 05:45:07',
            ),
        ));
        
        
    }
}
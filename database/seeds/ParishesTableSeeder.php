<?php

use Illuminate\Database\Seeder;

class ParishesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parishes')->delete();
        
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alto Orinoco',
                'city_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Huachamacare Acanaña',
                'city_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Marawaka Toky Shamanaña',
                'city_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Mavaka Mavaka',
                'city_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Sierra Parima Parimabé',
                'city_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ucata Laja Lisa',
                'city_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Yapacana Macuruco',
                'city_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Caname Guarinuma',
                'city_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Fernando Girón Tovar',
                'city_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Luis Alberto Gómez',
                'city_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pahueña Limón de Parhueña',
                'city_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Platanillal Platanillal',
                'city_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Samariapo',
                'city_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Sipapo',
                'city_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Munduapo',
                'city_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Guayapo',
                'city_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Alto Ventuari',
                'city_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Medio Ventuari',
                'city_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Bajo Ventuari',
                'city_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Victorino',
                'city_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Comunidad',
                'city_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Casiquiare',
                'city_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Cocuy',
                'city_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'San Carlos de Río Negro',
                'city_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Solano',
                'city_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Anaco',
                'city_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'San Joaquín',
                'city_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Cachipo',
                'city_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Aragua de Barcelona',
                'city_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Lechería',
                'city_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'El Morro',
                'city_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Puerto Píritu',
                'city_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'San Miguel',
                'city_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Sucre',
                'city_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Valle de Guanape',
                'city_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Santa Bárbara',
                'city_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'El Chaparro',
                'city_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Tomás Alfaro',
                'city_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Calatrava',
                'city_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Guanta',
                'city_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Chorrerón',
                'city_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Mamo',
                'city_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Soledad',
                'city_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Mapire',
                'city_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Piar',
                'city_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Santa Clara',
                'city_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'San Diego de Cabrutica',
                'city_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Uverito',
                'city_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Zuata',
                'city_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Puerto La Cruz',
                'city_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Pozuelos',
                'city_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Onoto',
                'city_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'San Pablo',
                'city_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'San Mateo',
                'city_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'El Carito',
                'city_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Santa Inés',
                'city_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'La Romereña',
                'city_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Atapirire',
                'city_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Boca del Pao',
                'city_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'El Pao',
                'city_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Pariaguán',
                'city_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Cantaura',
                'city_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Libertador',
                'city_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Santa Rosa',
                'city_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Urica',
                'city_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Píritu',
                'city_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'San Francisco',
                'city_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'San José de Guanipa',
                'city_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Boca de Uchire',
                'city_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Boca de Chávez',
                'city_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Pueblo Nuevo',
                'city_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Santa Ana',
                'city_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Bergatín',
                'city_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Caigua',
                'city_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'El Carmen',
                'city_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'El Pilar',
                'city_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Naricual',
                'city_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'San Crsitóbal',
                'city_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Edmundo Barrios',
                'city_id' => 28,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Miguel Otero Silva',
                'city_id' => 28,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Achaguas',
                'city_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Apurito',
                'city_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'El Yagual',
                'city_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Guachara',
                'city_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Mucuritas',
                'city_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Queseras del medio',
                'city_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Biruaca',
                'city_id' => 30,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Bruzual',
                'city_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Mantecal',
                'city_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Quintero',
                'city_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Rincón Hondo',
                'city_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'San Vicente',
                'city_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Guasdualito',
                'city_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Aramendi',
                'city_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'El Amparo',
                'city_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'San Camilo',
                'city_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Urdaneta',
                'city_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'San Juan de Payara',
                'city_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Codazzi',
                'city_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Cunaviche',
                'city_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 101,
                'name' => 'Elorza',
                'city_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 102,
                'name' => 'La Trinidad',
                'city_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 103,
                'name' => 'San Fernando',
                'city_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 104,
                'name' => 'El Recreo',
                'city_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 105,
                'name' => 'Peñalver',
                'city_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 106,
                'name' => 'San Rafael de Atamaica',
                'city_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 107,
                'name' => 'Pedro José Ovalles',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 108,
                'name' => 'Joaquín Crespo',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 109,
                'name' => 'José Casanova Godoy',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 110,
                'name' => 'Madre María de San José',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 111,
                'name' => 'Andrés Eloy Blanco',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 112,
                'name' => 'Los Tacarigua',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 113,
                'name' => 'Las Delicias',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 114,
                'name' => 'Choroní',
                'city_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 115,
                'name' => 'Bolívar',
                'city_id' => 37,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 116,
                'name' => 'Camatagua',
                'city_id' => 38,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 117,
                'name' => 'Carmen de Cura',
                'city_id' => 38,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 118,
                'name' => 'Santa Rita',
                'city_id' => 39,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 119,
                'name' => 'Francisco de Miranda',
                'city_id' => 39,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 120,
                'name' => 'Moseñor Feliciano González',
                'city_id' => 39,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 121,
                'name' => 'Santa Cruz',
                'city_id' => 40,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 122,
                'name' => 'José Félix Ribas',
                'city_id' => 41,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 123,
                'name' => 'Castor Nieves Ríos',
                'city_id' => 41,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 124,
                'name' => 'Las Guacamayas',
                'city_id' => 41,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 125,
                'name' => 'Pao de Zárate',
                'city_id' => 41,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 126,
                'name' => 'Zuata',
                'city_id' => 41,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 127,
                'name' => 'José Rafael Revenga',
                'city_id' => 42,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 128,
                'name' => 'Palo Negro',
                'city_id' => 43,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 129,
                'name' => 'San Martín de Porres',
                'city_id' => 43,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 130,
                'name' => 'El Limón',
                'city_id' => 44,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 131,
                'name' => 'Caña de Azúcar',
                'city_id' => 44,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 132,
                'name' => 'Ocumare de la Costa',
                'city_id' => 45,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 133,
                'name' => 'San Casimiro',
                'city_id' => 46,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 134,
                'name' => 'Güiripa',
                'city_id' => 46,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 135,
                'name' => 'Ollas de Caramacate',
                'city_id' => 46,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 136,
                'name' => 'Valle Morín',
                'city_id' => 46,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 137,
                'name' => 'San Sebastían',
                'city_id' => 47,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 138,
                'name' => 'Turmero',
                'city_id' => 48,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 139,
                'name' => 'Arevalo Aponte',
                'city_id' => 48,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 140,
                'name' => 'Chuao',
                'city_id' => 48,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 141,
                'name' => 'Samán de Güere',
                'city_id' => 48,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 142,
                'name' => 'Alfredo Pacheco Miranda',
                'city_id' => 48,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 143,
                'name' => 'Santos Michelena',
                'city_id' => 49,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 144,
                'name' => 'Tiara',
                'city_id' => 49,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 145,
                'name' => 'Cagua',
                'city_id' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 146,
                'name' => 'Bella Vista',
                'city_id' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 147,
                'name' => 'Tovar',
                'city_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 148,
                'name' => 'Urdaneta',
                'city_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 149,
                'name' => 'Las Peñitas',
                'city_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 150,
                'name' => 'San Francisco de Cara',
                'city_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 151,
                'name' => 'Taguay',
                'city_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 152,
                'name' => 'Zamora',
                'city_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 153,
                'name' => 'Magdaleno',
                'city_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 154,
                'name' => 'San Francisco de Asís',
                'city_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 155,
                'name' => 'Valles de Tucutunemo',
                'city_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 156,
                'name' => 'Augusto Mijares',
                'city_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 157,
                'name' => 'Sabaneta',
                'city_id' => 54,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 158,
                'name' => 'Juan Antonio Rodríguez Domínguez',
                'city_id' => 54,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 159,
                'name' => 'El Cantón',
                'city_id' => 55,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 160,
                'name' => 'Santa Cruz de Guacas',
                'city_id' => 55,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 161,
                'name' => 'Puerto Vivas',
                'city_id' => 55,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 162,
                'name' => 'Ticoporo',
                'city_id' => 56,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 163,
                'name' => 'Nicolás Pulido',
                'city_id' => 56,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 164,
                'name' => 'Andrés Bello',
                'city_id' => 56,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 165,
                'name' => 'Arismendi',
                'city_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 166,
                'name' => 'Guadarrama',
                'city_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 167,
                'name' => 'La Unión',
                'city_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 168,
                'name' => 'San Antonio',
                'city_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 169,
                'name' => 'Barinas',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 170,
                'name' => 'Alberto Arvelo Larriva',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 171,
                'name' => 'San Silvestre',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 172,
                'name' => 'Santa Inés',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 173,
                'name' => 'Santa Lucía',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 174,
                'name' => 'Torumos',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 175,
                'name' => 'El Carmen',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 176,
                'name' => 'Rómulo Betancourt',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 177,
                'name' => 'Corazón de Jesús',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 178,
                'name' => 'Ramón Ignacio Méndez',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 179,
                'name' => 'Alto Barinas',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 180,
                'name' => 'Manuel Palacio Fajardo',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 181,
                'name' => 'Juan Antonio Rodríguez Domínguez',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 182,
                'name' => 'Dominga Ortiz de Páez',
                'city_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 183,
                'name' => 'Barinitas',
                'city_id' => 59,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 184,
                'name' => 'Altamira de Cáceres',
                'city_id' => 59,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 185,
                'name' => 'Calderas',
                'city_id' => 59,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 186,
                'name' => 'Barrancas',
                'city_id' => 60,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 187,
                'name' => 'El Socorro',
                'city_id' => 60,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 188,
                'name' => 'Mazparrito',
                'city_id' => 60,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 189,
                'name' => 'Santa Bárbara',
                'city_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 190,
                'name' => 'Pedro Briceño Méndez',
                'city_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 191,
                'name' => 'Ramón Ignacio Méndez',
                'city_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 192,
                'name' => 'José Ignacio del Pumar',
                'city_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 193,
                'name' => 'Obispos',
                'city_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 194,
                'name' => 'Guasimitos',
                'city_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 195,
                'name' => 'El Real',
                'city_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 196,
                'name' => 'La Luz',
                'city_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 197,
                'name' => 'Ciudad Bolívia',
                'city_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 198,
                'name' => 'José Ignacio Briceño',
                'city_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 199,
                'name' => 'José Félix Ribas',
                'city_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 200,
                'name' => 'Páez',
                'city_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 201,
                'name' => 'Libertad',
                'city_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 202,
                'name' => 'Dolores',
                'city_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 203,
                'name' => 'Santa Rosa',
                'city_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 204,
                'name' => 'Palacio Fajardo',
                'city_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 205,
                'name' => 'Ciudad de Nutrias',
                'city_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 206,
                'name' => 'El Regalo',
                'city_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 207,
                'name' => 'Puerto Nutrias',
                'city_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 208,
                'name' => 'Santa Catalina',
                'city_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 209,
                'name' => 'Cachamay',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 210,
                'name' => 'Chirica',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 211,
                'name' => 'Dalla Costa',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 212,
                'name' => 'Once de Abril',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 213,
                'name' => 'Simón Bolívar',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 214,
                'name' => 'Unare',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 215,
                'name' => 'Universidad',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 216,
                'name' => 'Vista al Sol',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 217,
                'name' => 'Pozo Verde',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 218,
                'name' => 'Yocoima',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 219,
                'name' => '5 de Julio',
                'city_id' => 66,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 220,
                'name' => 'Cedeño',
                'city_id' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 221,
                'name' => 'Altagracia',
                'city_id' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 222,
                'name' => 'Ascensión Farreras',
                'city_id' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 223,
                'name' => 'Guaniamo',
                'city_id' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 224,
                'name' => 'La Urbana',
                'city_id' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 225,
                'name' => 'Pijiguaos',
                'city_id' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 226,
                'name' => 'El Callao',
                'city_id' => 68,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 227,
                'name' => 'Gran Sabana',
                'city_id' => 69,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 228,
                'name' => 'Ikabarú',
                'city_id' => 69,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 229,
                'name' => 'Catedral',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 230,
                'name' => 'Zea',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 231,
                'name' => 'Orinoco',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 232,
                'name' => 'José Antonio Páez',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 233,
                'name' => 'Marhuanta',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 234,
                'name' => 'Agua Salada',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 235,
                'name' => 'Vista Hermosa',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 236,
                'name' => 'La Sabanita',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 237,
                'name' => 'Panapana',
                'city_id' => 70,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 238,
                'name' => 'Andrés Eloy Blanco',
                'city_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 239,
                'name' => 'Pedro Cova',
                'city_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 240,
                'name' => 'Raúl Leoni',
                'city_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 241,
                'name' => 'Barceloneta',
                'city_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 242,
                'name' => 'Santa Bárbara',
                'city_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 243,
                'name' => 'San Francisco',
                'city_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 244,
                'name' => 'Roscio',
                'city_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 245,
                'name' => 'Salóm',
                'city_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 246,
                'name' => 'Sifontes',
                'city_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 247,
                'name' => 'Dalla Costa',
                'city_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 248,
                'name' => 'San Isidro',
                'city_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 249,
                'name' => 'Sucre',
                'city_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 250,
                'name' => 'Aripao',
                'city_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 251,
                'name' => 'Guarataro',
                'city_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 252,
                'name' => 'Las Majadas',
                'city_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 253,
                'name' => 'Moitaco',
                'city_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 254,
                'name' => 'Padre Pedro Chien',
                'city_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 255,
                'name' => 'Río Grande',
                'city_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 256,
                'name' => 'Bejuma',
                'city_id' => 77,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 257,
                'name' => 'Canoabo',
                'city_id' => 77,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 258,
                'name' => 'Simón Bolívar',
                'city_id' => 77,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 259,
                'name' => 'Güigüe',
                'city_id' => 78,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 260,
                'name' => 'Carabobo',
                'city_id' => 78,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 261,
                'name' => 'Tacarigua',
                'city_id' => 78,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 262,
                'name' => 'Mariara',
                'city_id' => 79,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 263,
                'name' => 'Aguas Calientes',
                'city_id' => 79,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 264,
                'name' => 'Ciudad Alianza',
                'city_id' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 265,
                'name' => 'Guacara',
                'city_id' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 266,
                'name' => 'Yagua',
                'city_id' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 267,
                'name' => 'Morón',
                'city_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 268,
                'name' => 'Yagua',
                'city_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 269,
                'name' => 'Tocuyito',
                'city_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 270,
                'name' => 'Independencia',
                'city_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 271,
                'name' => 'Los Guayos',
                'city_id' => 83,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 272,
                'name' => 'Miranda',
                'city_id' => 84,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 273,
                'name' => 'Montalbán',
                'city_id' => 85,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 274,
                'name' => 'Naguanagua',
                'city_id' => 86,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 275,
                'name' => 'Bartolomé Salóm',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 276,
                'name' => 'Democracia',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 277,
                'name' => 'Fraternidad',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 278,
                'name' => 'Goaigoaza',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 279,
                'name' => 'Juan José Flores',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 280,
                'name' => 'Unión',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 281,
                'name' => 'Borburata',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 282,
                'name' => 'Patanemo',
                'city_id' => 87,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 283,
                'name' => 'San Diego',
                'city_id' => 88,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 284,
                'name' => 'San Joaquín',
                'city_id' => 89,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 285,
                'name' => 'Candelaria',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 286,
                'name' => 'Catedral',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 287,
                'name' => 'El Socorro',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 288,
                'name' => 'Miguel Peña',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 289,
                'name' => 'Rafael Urdaneta',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 290,
                'name' => 'San Blas',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 291,
                'name' => 'San José',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 292,
                'name' => 'Santa Rosa',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 293,
                'name' => 'Negro Primero',
                'city_id' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 294,
                'name' => 'Cojedes',
                'city_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 295,
                'name' => 'Juan de Mata Suárez',
                'city_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 296,
                'name' => 'Tinaquillo',
                'city_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 297,
                'name' => 'El Baúl',
                'city_id' => 93,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 298,
                'name' => 'Sucre',
                'city_id' => 93,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 299,
                'name' => 'La Aguadita',
                'city_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 300,
                'name' => 'Macapo',
                'city_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 301,
                'name' => 'El Pao',
                'city_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 302,
                'name' => 'El Amparo',
                'city_id' => 96,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 303,
                'name' => 'Libertad de Cojedes',
                'city_id' => 96,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 304,
                'name' => 'Rómulo Gallegos',
                'city_id' => 97,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 305,
                'name' => 'San Carlos de Austria',
                'city_id' => 98,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 306,
                'name' => 'Juan Ángel Bravo',
                'city_id' => 98,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 307,
                'name' => 'Manuel Manrique',
                'city_id' => 98,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 308,
                'name' => 'General en Jefe José Laurencio Silva',
                'city_id' => 99,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 309,
                'name' => 'Curiapo',
                'city_id' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 310,
                'name' => 'Almirante Luis Brión',
                'city_id' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 311,
                'name' => 'Francisco Aniceto Lugo',
                'city_id' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 312,
                'name' => 'Manuel Renaud',
                'city_id' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 313,
                'name' => 'Padre Barral',
                'city_id' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 314,
                'name' => 'Santos de Abelgas',
                'city_id' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 315,
                'name' => 'Imataca',
                'city_id' => 101,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 316,
                'name' => 'Cinco de Julio',
                'city_id' => 101,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 317,
                'name' => 'Juan Bautista Arismendi',
                'city_id' => 101,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 318,
                'name' => 'Manuel Piar',
                'city_id' => 101,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 319,
                'name' => 'Rómulo Gallegos',
                'city_id' => 101,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 320,
                'name' => 'Pedernales',
                'city_id' => 102,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 321,
                'name' => 'Luis Beltrán Prieto Figueroa',
                'city_id' => 102,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 322,
            'name' => 'San José (Delta Amacuro)',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 323,
                'name' => 'José Vidal Marcano',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 324,
                'name' => 'Juan Millán',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 325,
                'name' => 'Leonardo Ruíz Pineda',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 326,
                'name' => 'Mariscal Antonio José de Sucre',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 327,
                'name' => 'Monseñor Argimiro García',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 328,
            'name' => 'San Rafael (Delta Amacuro)',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 329,
                'name' => 'Virgen del Valle',
                'city_id' => 103,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 330,
                'name' => 'Clarines',
                'city_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 331,
                'name' => 'Guanape',
                'city_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 332,
                'name' => 'Sabana de Uchire',
                'city_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 333,
                'name' => 'Capadare',
                'city_id' => 104,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 334,
                'name' => 'La Pastora',
                'city_id' => 104,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 335,
                'name' => 'Libertador',
                'city_id' => 104,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 336,
                'name' => 'San Juan de los Cayos',
                'city_id' => 104,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 337,
                'name' => 'Aracua',
                'city_id' => 105,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 338,
                'name' => 'La Peña',
                'city_id' => 105,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 339,
                'name' => 'San Luis',
                'city_id' => 105,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 340,
                'name' => 'Bariro',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 341,
                'name' => 'Borojó',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 342,
                'name' => 'Capatárida',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 343,
                'name' => 'Guajiro',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 344,
                'name' => 'Seque',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 345,
                'name' => 'Zazárida',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 346,
                'name' => 'Valle de Eroa',
                'city_id' => 106,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 347,
                'name' => 'Cacique Manaure',
                'city_id' => 107,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 348,
                'name' => 'Norte',
                'city_id' => 108,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 349,
                'name' => 'Carirubana',
                'city_id' => 108,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 350,
                'name' => 'Santa Ana',
                'city_id' => 108,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 351,
                'name' => 'Urbana Punta Cardón',
                'city_id' => 108,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 352,
                'name' => 'La Vela de Coro',
                'city_id' => 109,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 353,
                'name' => 'Acurigua',
                'city_id' => 109,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 354,
                'name' => 'Guaibacoa',
                'city_id' => 109,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 355,
                'name' => 'Las Calderas',
                'city_id' => 109,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 356,
                'name' => 'Macoruca',
                'city_id' => 109,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 357,
                'name' => 'Dabajuro',
                'city_id' => 110,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 358,
                'name' => 'Agua Clara',
                'city_id' => 111,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 359,
                'name' => 'Avaria',
                'city_id' => 111,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 360,
                'name' => 'Pedregal',
                'city_id' => 111,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 361,
                'name' => 'Piedra Grande',
                'city_id' => 111,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 362,
                'name' => 'Purureche',
                'city_id' => 111,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 363,
                'name' => 'Adaure',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 364,
                'name' => 'Adícora',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 365,
                'name' => 'Baraived',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 366,
                'name' => 'Buena Vista',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 367,
                'name' => 'Jadacaquiva',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 368,
                'name' => 'El Vínculo',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 369,
                'name' => 'El Hato',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 370,
                'name' => 'Moruy',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 371,
                'name' => 'Pueblo Nuevo',
                'city_id' => 112,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 372,
                'name' => 'Agua Larga',
                'city_id' => 113,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 373,
                'name' => 'El Paují',
                'city_id' => 113,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 374,
                'name' => 'Independencia',
                'city_id' => 113,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 375,
                'name' => 'Mapararí',
                'city_id' => 113,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 376,
                'name' => 'Agua Linda',
                'city_id' => 114,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 377,
                'name' => 'Araurima',
                'city_id' => 114,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 378,
                'name' => 'Jacura',
                'city_id' => 114,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 379,
                'name' => 'Tucacas',
                'city_id' => 115,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 380,
                'name' => 'Boca de Aroa',
                'city_id' => 115,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 381,
                'name' => 'Los Taques',
                'city_id' => 116,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 382,
                'name' => 'Judibana',
                'city_id' => 116,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 383,
                'name' => 'Mene de Mauroa',
                'city_id' => 117,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 384,
                'name' => 'San Félix',
                'city_id' => 117,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 385,
                'name' => 'Casigua',
                'city_id' => 117,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 386,
                'name' => 'Guzmán Guillermo',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 387,
                'name' => 'Mitare',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 388,
                'name' => 'Río Seco',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 389,
                'name' => 'Sabaneta',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 390,
                'name' => 'San Antonio',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 391,
                'name' => 'San Gabriel',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 392,
                'name' => 'Santa Ana',
                'city_id' => 118,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 393,
                'name' => 'Boca del Tocuyo',
                'city_id' => 119,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 394,
                'name' => 'Chichiriviche',
                'city_id' => 119,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 395,
                'name' => 'Tocuyo de la Costa',
                'city_id' => 119,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 396,
                'name' => 'Palmasola',
                'city_id' => 120,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 397,
                'name' => 'Cabure',
                'city_id' => 121,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 398,
                'name' => 'Colina',
                'city_id' => 121,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 399,
                'name' => 'Curimagua',
                'city_id' => 121,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 400,
                'name' => 'San José de la Costa',
                'city_id' => 122,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 401,
                'name' => 'Píritu',
                'city_id' => 122,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 402,
                'name' => 'San Francisco',
                'city_id' => 123,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 403,
                'name' => 'Sucre',
                'city_id' => 124,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 404,
                'name' => 'Pecaya',
                'city_id' => 124,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 405,
                'name' => 'Tocópero',
                'city_id' => 125,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 406,
                'name' => 'El Charal',
                'city_id' => 126,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 407,
                'name' => 'Las Vegas del Tuy',
                'city_id' => 126,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 408,
                'name' => 'Santa Cruz de Bucaral',
                'city_id' => 126,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 409,
                'name' => 'Bruzual',
                'city_id' => 127,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 410,
                'name' => 'Urumaco',
                'city_id' => 127,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 411,
                'name' => 'Puerto Cumarebo',
                'city_id' => 128,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 412,
                'name' => 'La Ciénaga',
                'city_id' => 128,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 413,
                'name' => 'La Soledad',
                'city_id' => 128,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 414,
                'name' => 'Pueblo Cumarebo',
                'city_id' => 128,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 415,
                'name' => 'Zazárida',
                'city_id' => 128,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 416,
                'name' => 'Churuguara',
                'city_id' => 113,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 417,
                'name' => 'Camaguán',
                'city_id' => 129,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 418,
                'name' => 'Puerto Miranda',
                'city_id' => 129,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 419,
                'name' => 'Uverito',
                'city_id' => 129,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 420,
                'name' => 'Chaguaramas',
                'city_id' => 130,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 421,
                'name' => 'El Socorro',
                'city_id' => 131,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 422,
                'name' => 'Tucupido',
                'city_id' => 132,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 423,
                'name' => 'San Rafael de Laya',
                'city_id' => 132,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 424,
                'name' => 'Altagracia de Orituco',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 425,
                'name' => 'San Rafael de Orituco',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 426,
                'name' => 'San Francisco Javier de Lezama',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 427,
                'name' => 'Paso Real de Macaira',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 428,
                'name' => 'Carlos Soublette',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 429,
                'name' => 'San Francisco de Macaira',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 430,
                'name' => 'Libertad de Orituco',
                'city_id' => 133,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 431,
                'name' => 'Cantaclaro',
                'city_id' => 134,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 432,
                'name' => 'San Juan de los Morros',
                'city_id' => 134,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 433,
                'name' => 'Parapara',
                'city_id' => 134,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 434,
                'name' => 'El Sombrero',
                'city_id' => 135,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 435,
                'name' => 'Sosa',
                'city_id' => 135,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 436,
                'name' => 'Las Mercedes',
                'city_id' => 136,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 437,
                'name' => 'Cabruta',
                'city_id' => 136,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 438,
                'name' => 'Santa Rita de Manapire',
                'city_id' => 136,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 439,
                'name' => 'Valle de la Pascua',
                'city_id' => 137,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 440,
                'name' => 'Espino',
                'city_id' => 137,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 441,
                'name' => 'San José de Unare',
                'city_id' => 138,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 442,
                'name' => 'Zaraza',
                'city_id' => 138,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 443,
                'name' => 'San José de Tiznados',
                'city_id' => 139,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 444,
                'name' => 'San Francisco de Tiznados',
                'city_id' => 139,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 445,
                'name' => 'San Lorenzo de Tiznados',
                'city_id' => 139,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 446,
                'name' => 'Ortiz',
                'city_id' => 139,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 447,
                'name' => 'Guayabal',
                'city_id' => 140,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 448,
                'name' => 'Cazorla',
                'city_id' => 140,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 449,
                'name' => 'San José de Guaribe',
                'city_id' => 141,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 450,
                'name' => 'Uveral',
                'city_id' => 141,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 451,
                'name' => 'Santa María de Ipire',
                'city_id' => 142,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 452,
                'name' => 'Altamira',
                'city_id' => 142,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 453,
                'name' => 'El Calvario',
                'city_id' => 143,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 454,
                'name' => 'El Rastro',
                'city_id' => 143,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 455,
                'name' => 'Guardatinajas',
                'city_id' => 143,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 456,
                'name' => 'Capital Urbana Calabozo',
                'city_id' => 143,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 457,
                'name' => 'Quebrada Honda de Guache',
                'city_id' => 144,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 458,
                'name' => 'Pío Tamayo',
                'city_id' => 144,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 459,
                'name' => 'Yacambú',
                'city_id' => 144,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 460,
                'name' => 'Fréitez',
                'city_id' => 145,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 461,
                'name' => 'José María Blanco',
                'city_id' => 145,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 462,
                'name' => 'Catedral',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 463,
                'name' => 'Concepción',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 464,
                'name' => 'El Cují',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 465,
                'name' => 'Juan de Villegas',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 466,
                'name' => 'Santa Rosa',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 467,
                'name' => 'Tamaca',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 468,
                'name' => 'Unión',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 469,
                'name' => 'Aguedo Felipe Alvarado',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 470,
                'name' => 'Buena Vista',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 471,
                'name' => 'Juárez',
                'city_id' => 146,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 472,
                'name' => 'Juan Bautista Rodríguez',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 473,
                'name' => 'Cuara',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 474,
                'name' => 'Diego de Lozada',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 475,
                'name' => 'Paraíso de San José',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 476,
                'name' => 'San Miguel',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 477,
                'name' => 'Tintorero',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 478,
                'name' => 'José Bernardo Dorante',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 479,
                'name' => 'Coronel Mariano Peraza ',
                'city_id' => 147,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 480,
                'name' => 'Bolívar',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 481,
                'name' => 'Anzoátegui',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 482,
                'name' => 'Guarico',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 483,
                'name' => 'Hilario Luna y Luna',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 484,
                'name' => 'Humocaro Alto',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 485,
                'name' => 'Humocaro Bajo',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 486,
                'name' => 'La Candelaria',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 487,
                'name' => 'Morán',
                'city_id' => 148,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 488,
                'name' => 'Cabudare',
                'city_id' => 149,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 489,
                'name' => 'José Gregorio Bastidas',
                'city_id' => 149,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 490,
                'name' => 'Agua Viva',
                'city_id' => 149,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 491,
                'name' => 'Sarare',
                'city_id' => 150,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 492,
                'name' => 'Buría',
                'city_id' => 150,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 493,
                'name' => 'Gustavo Vegas León',
                'city_id' => 150,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 494,
                'name' => 'Trinidad Samuel',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 495,
                'name' => 'Antonio Díaz',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 496,
                'name' => 'Camacaro',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 497,
                'name' => 'Castañeda',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 498,
                'name' => 'Cecilio Zubillaga',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 499,
                'name' => 'Chiquinquirá',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 500,
                'name' => 'El Blanco',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 501,
                'name' => 'Espinoza de los Monteros',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'name' => 'Lara',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'name' => 'Las Mercedes',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'name' => 'Manuel Morillo',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'name' => 'Montaña Verde',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'name' => 'Montes de Oca',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'name' => 'Torres',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'name' => 'Heriberto Arroyo',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'name' => 'Reyes Vargas',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'name' => 'Altagracia',
                'city_id' => 151,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'name' => 'Siquisique',
                'city_id' => 152,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'name' => 'Moroturo',
                'city_id' => 152,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'name' => 'San Miguel',
                'city_id' => 152,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'name' => 'Xaguas',
                'city_id' => 152,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'name' => 'Presidente Betancourt',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'name' => 'Presidente Páez',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'name' => 'Presidente Rómulo Gallegos',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'name' => 'Gabriel Picón González',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 519,
                'name' => 'Héctor Amable Mora',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 520,
                'name' => 'José Nucete Sardi',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 521,
                'name' => 'Pulido Méndez',
                'city_id' => 179,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 522,
                'name' => 'La Azulita',
                'city_id' => 180,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 523,
                'name' => 'Santa Cruz de Mora',
                'city_id' => 181,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 524,
                'name' => 'Mesa Bolívar',
                'city_id' => 181,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 525,
                'name' => 'Mesa de Las Palmas',
                'city_id' => 181,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 526,
                'name' => 'Aricagua',
                'city_id' => 182,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 527,
                'name' => 'San Antonio',
                'city_id' => 182,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 528,
                'name' => 'Canagua',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 529,
                'name' => 'Capurí',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 530,
                'name' => 'Chacantá',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 531,
                'name' => 'El Molino',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 532,
                'name' => 'Guaimaral',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 533,
                'name' => 'Mucutuy',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 534,
                'name' => 'Mucuchachí',
                'city_id' => 183,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 535,
                'name' => 'Fernández Peña',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 536,
                'name' => 'Matriz',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 537,
                'name' => 'Montalbán',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 538,
                'name' => 'Acequias',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 539,
                'name' => 'Jají',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 540,
                'name' => 'La Mesa',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 541,
                'name' => 'San José del Sur',
                'city_id' => 184,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 542,
                'name' => 'Tucaní',
                'city_id' => 185,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 543,
                'name' => 'Florencio Ramírez',
                'city_id' => 185,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 544,
                'name' => 'Santo Domingo',
                'city_id' => 186,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 545,
                'name' => 'Las Piedras',
                'city_id' => 186,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 546,
                'name' => 'Guaraque',
                'city_id' => 187,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 547,
                'name' => 'Mesa de Quintero',
                'city_id' => 187,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 548,
                'name' => 'Río Negro',
                'city_id' => 187,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 549,
                'name' => 'Arapuey',
                'city_id' => 188,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 550,
                'name' => 'Palmira',
                'city_id' => 188,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 551,
                'name' => 'San Cristóbal de Torondoy',
                'city_id' => 189,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 552,
                'name' => 'Torondoy',
                'city_id' => 189,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 553,
                'name' => 'Antonio Spinetti Dini',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 554,
                'name' => 'Arias',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 555,
                'name' => 'Caracciolo Parra Pérez',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 556,
                'name' => 'Domingo Peña',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 557,
                'name' => 'El Llano',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 558,
                'name' => 'Gonzalo Picón Febres',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 559,
                'name' => 'Jacinto Plaza',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 560,
                'name' => 'Juan Rodríguez Suárez',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 561,
                'name' => 'Lasso de la Vega',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 562,
                'name' => 'Mariano Picón Salas',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 563,
                'name' => 'Milla',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 564,
                'name' => 'Osuna Rodríguez',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 565,
                'name' => 'Sagrario',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 566,
                'name' => 'El Morro',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 567,
                'name' => 'Los Nevados',
                'city_id' => 190,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 568,
                'name' => 'Andrés Eloy Blanco',
                'city_id' => 191,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 569,
                'name' => 'La Venta',
                'city_id' => 191,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 570,
                'name' => 'Piñango',
                'city_id' => 191,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 571,
                'name' => 'Timotes',
                'city_id' => 191,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 572,
                'name' => 'Eloy Paredes',
                'city_id' => 192,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 573,
                'name' => 'San Rafael de Alcázar',
                'city_id' => 192,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 574,
                'name' => 'Santa Elena de Arenales',
                'city_id' => 192,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 575,
                'name' => 'Santa María de Caparo',
                'city_id' => 193,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 576,
                'name' => 'Pueblo Llano',
                'city_id' => 194,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 577,
                'name' => 'Cacute',
                'city_id' => 195,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 578,
                'name' => 'La Toma',
                'city_id' => 195,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 579,
                'name' => 'Mucuchíes',
                'city_id' => 195,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 580,
                'name' => 'Mucurubá',
                'city_id' => 195,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 581,
                'name' => 'San Rafael',
                'city_id' => 195,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 582,
                'name' => 'Gerónimo Maldonado',
                'city_id' => 196,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 583,
                'name' => 'Bailadores',
                'city_id' => 196,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 584,
                'name' => 'Tabay',
                'city_id' => 197,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 585,
                'name' => 'Chiguará',
                'city_id' => 198,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 586,
                'name' => 'Estánquez',
                'city_id' => 198,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 587,
                'name' => 'Lagunillas',
                'city_id' => 198,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 588,
                'name' => 'La Trampa',
                'city_id' => 198,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 589,
                'name' => 'Pueblo Nuevo del Sur',
                'city_id' => 198,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 590,
                'name' => 'San Juan',
                'city_id' => 198,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 591,
                'name' => 'El Amparo',
                'city_id' => 199,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 592,
                'name' => 'El Llano',
                'city_id' => 199,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 593,
                'name' => 'San Francisco',
                'city_id' => 199,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 594,
                'name' => 'Tovar',
                'city_id' => 199,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 595,
                'name' => 'Independencia',
                'city_id' => 200,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 596,
                'name' => 'María de la Concepción Palacios Blanco',
                'city_id' => 200,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 597,
                'name' => 'Nueva Bolivia',
                'city_id' => 200,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 598,
                'name' => 'Santa Apolonia',
                'city_id' => 200,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 599,
                'name' => 'Caño El Tigre',
                'city_id' => 201,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 600,
                'name' => 'Zea',
                'city_id' => 201,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 601,
                'name' => 'Aragüita',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 602,
                'name' => 'Arévalo González',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 603,
                'name' => 'Capaya',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 604,
                'name' => 'Caucagua',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 605,
                'name' => 'Panaquire',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 606,
                'name' => 'Ribas',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 607,
                'name' => 'El Café',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 608,
                'name' => 'Marizapa',
                'city_id' => 223,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 609,
                'name' => 'Cumbo',
                'city_id' => 224,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 610,
                'name' => 'San José de Barlovento',
                'city_id' => 224,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 611,
                'name' => 'El Cafetal',
                'city_id' => 225,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 612,
                'name' => 'Las Minas',
                'city_id' => 225,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 613,
                'name' => 'Nuestra Señora del Rosario',
                'city_id' => 225,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 614,
                'name' => 'Higuerote',
                'city_id' => 226,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 615,
                'name' => 'Curiepe',
                'city_id' => 226,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 616,
                'name' => 'Tacarigua de Brión',
                'city_id' => 226,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 617,
                'name' => 'Mamporal',
                'city_id' => 227,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 618,
                'name' => 'Carrizal',
                'city_id' => 228,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 619,
                'name' => 'Chacao',
                'city_id' => 229,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 620,
                'name' => 'Charallave',
                'city_id' => 230,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 621,
                'name' => 'Las Brisas',
                'city_id' => 230,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 622,
                'name' => 'El Hatillo',
                'city_id' => 231,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 623,
                'name' => 'Altagracia de la Montaña',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 624,
                'name' => 'Cecilio Acosta',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 625,
                'name' => 'Los Teques',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 626,
                'name' => 'El Jarillo',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 627,
                'name' => 'San Pedro',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 628,
                'name' => 'Tácata',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 629,
                'name' => 'Paracotos',
                'city_id' => 232,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 630,
                'name' => 'Cartanal',
                'city_id' => 233,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 631,
                'name' => 'Santa Teresa del Tuy',
                'city_id' => 233,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 632,
                'name' => 'La Democracia',
                'city_id' => 234,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 633,
                'name' => 'Ocumare del Tuy',
                'city_id' => 234,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 634,
                'name' => 'Santa Bárbara',
                'city_id' => 234,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 635,
                'name' => 'San Antonio de los Altos',
                'city_id' => 235,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 636,
                'name' => 'Río Chico',
                'city_id' => 236,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 637,
                'name' => 'El Guapo',
                'city_id' => 236,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 638,
                'name' => 'Tacarigua de la Laguna',
                'city_id' => 236,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 639,
                'name' => 'Paparo',
                'city_id' => 236,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 640,
                'name' => 'San Fernando del Guapo',
                'city_id' => 236,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 641,
                'name' => 'Santa Lucía del Tuy',
                'city_id' => 237,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 642,
                'name' => 'Cúpira',
                'city_id' => 238,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 643,
                'name' => 'Machurucuto',
                'city_id' => 238,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 644,
                'name' => 'Guarenas',
                'city_id' => 239,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 645,
                'name' => 'San Antonio de Yare',
                'city_id' => 240,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 646,
                'name' => 'San Francisco de Yare',
                'city_id' => 240,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 647,
                'name' => 'Leoncio Martínez',
                'city_id' => 241,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 648,
                'name' => 'Petare',
                'city_id' => 241,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 649,
                'name' => 'Caucagüita',
                'city_id' => 241,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 650,
                'name' => 'Filas de Mariche',
                'city_id' => 241,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 651,
                'name' => 'La Dolorita',
                'city_id' => 241,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 652,
                'name' => 'Cúa',
                'city_id' => 242,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 653,
                'name' => 'Nueva Cúa',
                'city_id' => 242,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 654,
                'name' => 'Guatire',
                'city_id' => 243,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 655,
                'name' => 'Bolívar',
                'city_id' => 243,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 656,
                'name' => 'San Antonio de Maturín',
                'city_id' => 258,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 657,
                'name' => 'San Francisco de Maturín',
                'city_id' => 258,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 658,
                'name' => 'Aguasay',
                'city_id' => 259,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 659,
                'name' => 'Caripito',
                'city_id' => 260,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 660,
                'name' => 'El Guácharo',
                'city_id' => 261,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 661,
                'name' => 'La Guanota',
                'city_id' => 261,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 662,
                'name' => 'Sabana de Piedra',
                'city_id' => 261,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 663,
                'name' => 'San Agustín',
                'city_id' => 261,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 664,
                'name' => 'Teresen',
                'city_id' => 261,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 665,
                'name' => 'Caripe',
                'city_id' => 261,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 666,
                'name' => 'Areo',
                'city_id' => 262,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 667,
                'name' => 'Capital Cedeño',
                'city_id' => 262,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 668,
                'name' => 'San Félix de Cantalicio',
                'city_id' => 262,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 669,
                'name' => 'Viento Fresco',
                'city_id' => 262,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 670,
                'name' => 'El Tejero',
                'city_id' => 263,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 671,
                'name' => 'Punta de Mata',
                'city_id' => 263,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 672,
                'name' => 'Chaguaramas',
                'city_id' => 264,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 673,
                'name' => 'Las Alhuacas',
                'city_id' => 264,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 674,
                'name' => 'Tabasca',
                'city_id' => 264,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 675,
                'name' => 'Temblador',
                'city_id' => 264,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 676,
                'name' => 'Alto de los Godos',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 677,
                'name' => 'Boquerón',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 678,
                'name' => 'Las Cocuizas',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 679,
                'name' => 'La Cruz',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 680,
                'name' => 'San Simón',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 681,
                'name' => 'El Corozo',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 682,
                'name' => 'El Furrial',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 683,
                'name' => 'Jusepín',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 684,
                'name' => 'La Pica',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 685,
                'name' => 'San Vicente',
                'city_id' => 265,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 686,
                'name' => 'Aparicio',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 687,
                'name' => 'Aragua de Maturín',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 688,
                'name' => 'Chaguamal',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 689,
                'name' => 'El Pinto',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 690,
                'name' => 'Guanaguana',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 691,
                'name' => 'La Toscana',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 692,
                'name' => 'Taguaya',
                'city_id' => 266,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 693,
                'name' => 'Cachipo',
                'city_id' => 267,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 694,
                'name' => 'Quiriquire',
                'city_id' => 267,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 695,
                'name' => 'Santa Bárbara',
                'city_id' => 268,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 696,
                'name' => 'Barrancas',
                'city_id' => 269,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 697,
                'name' => 'Los Barrancos de Fajardo',
                'city_id' => 269,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 698,
                'name' => 'Uracoa',
                'city_id' => 270,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 699,
                'name' => 'Antolín del Campo',
                'city_id' => 271,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 700,
                'name' => 'Arismendi',
                'city_id' => 272,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 701,
                'name' => 'García',
                'city_id' => 273,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 702,
                'name' => 'Francisco Fajardo',
                'city_id' => 273,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 703,
                'name' => 'Bolívar',
                'city_id' => 274,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 704,
                'name' => 'Guevara',
                'city_id' => 274,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 705,
                'name' => 'Matasiete',
                'city_id' => 274,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 706,
                'name' => 'Santa Ana',
                'city_id' => 274,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 707,
                'name' => 'Sucre',
                'city_id' => 274,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 708,
                'name' => 'Aguirre',
                'city_id' => 275,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 709,
                'name' => 'Maneiro',
                'city_id' => 275,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 710,
                'name' => 'Adrián',
                'city_id' => 276,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 711,
                'name' => 'Juan Griego',
                'city_id' => 276,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 712,
                'name' => 'Yaguaraparo',
                'city_id' => 276,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 713,
                'name' => 'Porlamar',
                'city_id' => 277,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 714,
                'name' => 'San Francisco de Macanao',
                'city_id' => 278,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 715,
                'name' => 'Boca de Río',
                'city_id' => 278,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 716,
                'name' => 'Tubores',
                'city_id' => 279,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 717,
                'name' => 'Los Baleales',
                'city_id' => 279,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 718,
                'name' => 'Vicente Fuentes',
                'city_id' => 280,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 719,
                'name' => 'Villalba',
                'city_id' => 280,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 720,
                'name' => 'San Juan Bautista',
                'city_id' => 281,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 721,
                'name' => 'Zabala',
                'city_id' => 281,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 722,
                'name' => 'Capital Araure',
                'city_id' => 283,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 723,
                'name' => 'Río Acarigua',
                'city_id' => 283,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 724,
                'name' => 'Capital Esteller',
                'city_id' => 284,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 725,
                'name' => 'Uveral',
                'city_id' => 284,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 726,
                'name' => 'Guanare',
                'city_id' => 285,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 727,
                'name' => 'Córdoba',
                'city_id' => 285,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 728,
                'name' => 'San José de la Montaña',
                'city_id' => 285,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 729,
                'name' => 'San Juan de Guanaguanare',
                'city_id' => 285,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 730,
                'name' => 'Virgen de la Coromoto',
                'city_id' => 285,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 731,
                'name' => 'Guanarito',
                'city_id' => 286,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 732,
                'name' => 'Trinidad de la Capilla',
                'city_id' => 286,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 733,
                'name' => 'Divina Pastora',
                'city_id' => 286,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 734,
                'name' => 'Monseñor José Vicente de Unda',
                'city_id' => 287,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 735,
                'name' => 'Peña Blanca',
                'city_id' => 287,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 736,
                'name' => 'Capital Ospino',
                'city_id' => 288,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 737,
                'name' => 'Aparición',
                'city_id' => 288,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 738,
                'name' => 'La Estación',
                'city_id' => 288,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 739,
                'name' => 'Páez',
                'city_id' => 289,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 740,
                'name' => 'Payara',
                'city_id' => 289,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 741,
                'name' => 'Pimpinela',
                'city_id' => 289,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 742,
                'name' => 'Ramón Peraza',
                'city_id' => 289,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 743,
                'name' => 'Papelón',
                'city_id' => 290,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 744,
                'name' => 'Caño Delgadito',
                'city_id' => 290,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 745,
                'name' => 'San Genaro de Boconoito',
                'city_id' => 291,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 746,
                'name' => 'Antolín Tovar',
                'city_id' => 291,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 747,
                'name' => 'San Rafael de Onoto',
                'city_id' => 292,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 748,
                'name' => 'Santa Fe',
                'city_id' => 292,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 749,
                'name' => 'Thermo Morles',
                'city_id' => 292,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 750,
                'name' => 'Santa Rosalía',
                'city_id' => 293,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 751,
                'name' => 'Florida',
                'city_id' => 293,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 752,
                'name' => 'Sucre',
                'city_id' => 294,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 753,
                'name' => 'Concepción',
                'city_id' => 294,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 754,
                'name' => 'San Rafael de Palo Alzado',
                'city_id' => 294,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 755,
                'name' => 'Uvencio Antonio Velásquez',
                'city_id' => 294,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 756,
                'name' => 'San José de Saguaz',
                'city_id' => 294,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 757,
                'name' => 'Villa Rosa',
                'city_id' => 294,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 758,
                'name' => 'Turén',
                'city_id' => 295,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 759,
                'name' => 'Canelones',
                'city_id' => 295,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 760,
                'name' => 'Santa Cruz',
                'city_id' => 295,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 761,
                'name' => 'San Isidro Labrador',
                'city_id' => 295,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 762,
                'name' => 'Mariño',
                'city_id' => 296,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 763,
                'name' => 'Rómulo Gallegos',
                'city_id' => 296,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 764,
                'name' => 'San José de Aerocuar',
                'city_id' => 297,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 765,
                'name' => 'Tavera Acosta',
                'city_id' => 297,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 766,
                'name' => 'Río Caribe',
                'city_id' => 298,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 767,
                'name' => 'Antonio José de Sucre',
                'city_id' => 298,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 768,
                'name' => 'El Morro de Puerto Santo',
                'city_id' => 298,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 769,
                'name' => 'Puerto Santo',
                'city_id' => 298,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 770,
                'name' => 'San Juan de las Galdonas',
                'city_id' => 298,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 771,
                'name' => 'El Pilar',
                'city_id' => 299,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 772,
                'name' => 'El Rincón',
                'city_id' => 299,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 773,
                'name' => 'General Francisco Antonio Váquez',
                'city_id' => 299,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 774,
                'name' => 'Guaraúnos',
                'city_id' => 299,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 775,
                'name' => 'Tunapuicito',
                'city_id' => 299,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 776,
                'name' => 'Unión',
                'city_id' => 299,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 777,
                'name' => 'Santa Catalina',
                'city_id' => 300,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 778,
                'name' => 'Santa Rosa',
                'city_id' => 300,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 779,
                'name' => 'Santa Teresa',
                'city_id' => 300,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 780,
                'name' => 'Bolívar',
                'city_id' => 300,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 781,
                'name' => 'Maracapana',
                'city_id' => 300,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 782,
                'name' => 'Libertad',
                'city_id' => 302,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 783,
                'name' => 'El Paujil',
                'city_id' => 302,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 784,
                'name' => 'Yaguaraparo',
                'city_id' => 302,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 785,
                'name' => 'Cruz Salmerón Acosta',
                'city_id' => 303,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 786,
                'name' => 'Chacopata',
                'city_id' => 303,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 787,
                'name' => 'Manicuare',
                'city_id' => 303,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 788,
                'name' => 'Tunapuy',
                'city_id' => 304,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 789,
                'name' => 'Campo Elías',
                'city_id' => 304,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 790,
                'name' => 'Irapa',
                'city_id' => 305,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 791,
                'name' => 'Campo Claro',
                'city_id' => 305,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 792,
                'name' => 'Maraval',
                'city_id' => 305,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 793,
                'name' => 'San Antonio de Irapa',
                'city_id' => 305,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 794,
                'name' => 'Soro',
                'city_id' => 305,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 795,
                'name' => 'Mejía',
                'city_id' => 306,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 796,
                'name' => 'Cumanacoa',
                'city_id' => 307,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 797,
                'name' => 'Arenas',
                'city_id' => 307,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 798,
                'name' => 'Aricagua',
                'city_id' => 307,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 799,
                'name' => 'Cogollar',
                'city_id' => 307,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 800,
                'name' => 'San Fernando',
                'city_id' => 307,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 801,
                'name' => 'San Lorenzo',
                'city_id' => 307,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 802,
            'name' => 'Villa Frontado (Muelle de Cariaco)',
                'city_id' => 308,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 803,
                'name' => 'Catuaro',
                'city_id' => 308,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 804,
                'name' => 'Rendón',
                'city_id' => 308,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 805,
                'name' => 'San Cruz',
                'city_id' => 308,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 806,
                'name' => 'Santa María',
                'city_id' => 308,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 807,
                'name' => 'Altagracia',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 808,
                'name' => 'Santa Inés',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 809,
                'name' => 'Valentín Valiente',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 810,
                'name' => 'Ayacucho',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 811,
                'name' => 'San Juan',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 812,
                'name' => 'Raúl Leoni',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 813,
                'name' => 'Gran Mariscal',
                'city_id' => 309,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 814,
                'name' => 'Cristóbal Colón',
                'city_id' => 310,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 815,
                'name' => 'Bideau',
                'city_id' => 310,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 816,
                'name' => 'Punta de Piedras',
                'city_id' => 310,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 817,
                'name' => 'Güiria',
                'city_id' => 310,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 818,
                'name' => 'Andrés Bello',
                'city_id' => 341,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 819,
                'name' => 'Antonio Rómulo Costa',
                'city_id' => 342,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 820,
                'name' => 'Ayacucho',
                'city_id' => 343,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 821,
                'name' => 'Rivas Berti',
                'city_id' => 343,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 822,
                'name' => 'San Pedro del Río',
                'city_id' => 343,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 823,
                'name' => 'Bolívar',
                'city_id' => 344,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 824,
                'name' => 'Palotal',
                'city_id' => 344,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 825,
                'name' => 'General Juan Vicente Gómez',
                'city_id' => 344,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 826,
                'name' => 'Isaías Medina Angarita',
                'city_id' => 344,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 827,
                'name' => 'Cárdenas',
                'city_id' => 345,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 828,
                'name' => 'Amenodoro Ángel Lamus',
                'city_id' => 345,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 829,
                'name' => 'La Florida',
                'city_id' => 345,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 830,
                'name' => 'Córdoba',
                'city_id' => 346,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 831,
                'name' => 'Fernández Feo',
                'city_id' => 347,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 832,
                'name' => 'Alberto Adriani',
                'city_id' => 347,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 833,
                'name' => 'Santo Domingo',
                'city_id' => 347,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 834,
                'name' => 'Francisco de Miranda',
                'city_id' => 348,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 835,
                'name' => 'García de Hevia',
                'city_id' => 349,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 836,
                'name' => 'Boca de Grita',
                'city_id' => 349,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 837,
                'name' => 'José Antonio Páez',
                'city_id' => 349,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 838,
                'name' => 'Guásimos',
                'city_id' => 350,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 839,
                'name' => 'Independencia',
                'city_id' => 351,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 840,
                'name' => 'Juan Germán Roscio',
                'city_id' => 351,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 841,
                'name' => 'Román Cárdenas',
                'city_id' => 351,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 842,
                'name' => 'Jáuregui',
                'city_id' => 352,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 843,
                'name' => 'Emilio Constantino Guerrero',
                'city_id' => 352,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 844,
                'name' => 'Monseñor Miguel Antonio Salas',
                'city_id' => 352,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 845,
                'name' => 'José María Vargas',
                'city_id' => 353,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 846,
                'name' => 'Junín',
                'city_id' => 354,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 847,
                'name' => 'La Petrólea',
                'city_id' => 354,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 848,
                'name' => 'Quinimarí',
                'city_id' => 354,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 849,
                'name' => 'Bramón',
                'city_id' => 354,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 850,
                'name' => 'Libertad',
                'city_id' => 355,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 851,
                'name' => 'Cipriano Castro',
                'city_id' => 355,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 852,
                'name' => 'Manuel Felipe Rugeles',
                'city_id' => 355,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 853,
                'name' => 'Libertador',
                'city_id' => 356,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 854,
                'name' => 'Doradas',
                'city_id' => 356,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 855,
                'name' => 'Emeterio Ochoa',
                'city_id' => 356,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 856,
                'name' => 'San Joaquín de Navay',
                'city_id' => 356,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 857,
                'name' => 'Lobatera',
                'city_id' => 357,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 858,
                'name' => 'Constitución',
                'city_id' => 357,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 859,
                'name' => 'Michelena',
                'city_id' => 358,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 860,
                'name' => 'Panamericano',
                'city_id' => 359,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 861,
                'name' => 'La Palmita',
                'city_id' => 359,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 862,
                'name' => 'Pedro María Ureña',
                'city_id' => 360,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 863,
                'name' => 'Nueva Arcadia',
                'city_id' => 360,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 864,
                'name' => 'Delicias',
                'city_id' => 361,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 865,
                'name' => 'Pecaya',
                'city_id' => 361,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 866,
                'name' => 'Samuel Darío Maldonado',
                'city_id' => 362,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 867,
                'name' => 'Boconó',
                'city_id' => 362,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 868,
                'name' => 'Hernández',
                'city_id' => 362,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 869,
                'name' => 'La Concordia',
                'city_id' => 363,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 870,
                'name' => 'San Juan Bautista',
                'city_id' => 363,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 871,
                'name' => 'Pedro María Morantes',
                'city_id' => 363,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 872,
                'name' => 'San Sebastián',
                'city_id' => 363,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 873,
                'name' => 'Dr. Francisco Romero Lobo',
                'city_id' => 363,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 874,
                'name' => 'Seboruco',
                'city_id' => 364,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 875,
                'name' => 'Simón Rodríguez',
                'city_id' => 365,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 876,
                'name' => 'Sucre',
                'city_id' => 366,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 877,
                'name' => 'Eleazar López Contreras',
                'city_id' => 366,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 878,
                'name' => 'San Pablo',
                'city_id' => 366,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 879,
                'name' => 'Torbes',
                'city_id' => 367,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 880,
                'name' => 'Uribante',
                'city_id' => 368,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 881,
                'name' => 'Cárdenas',
                'city_id' => 368,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 882,
                'name' => 'Juan Pablo Peñalosa',
                'city_id' => 368,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 883,
                'name' => 'Potosí',
                'city_id' => 368,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 884,
                'name' => 'San Judas Tadeo',
                'city_id' => 369,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 885,
                'name' => 'Araguaney',
                'city_id' => 370,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 886,
                'name' => 'El Jaguito',
                'city_id' => 370,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 887,
                'name' => 'La Esperanza',
                'city_id' => 370,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 888,
                'name' => 'Santa Isabel',
                'city_id' => 370,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 889,
                'name' => 'Boconó',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 890,
                'name' => 'El Carmen',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 891,
                'name' => 'Mosquey',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 892,
                'name' => 'Ayacucho',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 893,
                'name' => 'Burbusay',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 894,
                'name' => 'General Ribas',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 895,
                'name' => 'Guaramacal',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 896,
                'name' => 'Vega de Guaramacal',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 897,
                'name' => 'Monseñor Jáuregui',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 898,
                'name' => 'Rafael Rangel',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 899,
                'name' => 'San Miguel',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 900,
                'name' => 'San José',
                'city_id' => 371,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 901,
                'name' => 'Sabana Grande',
                'city_id' => 372,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 902,
                'name' => 'Cheregüé',
                'city_id' => 372,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 903,
                'name' => 'Granados',
                'city_id' => 372,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 904,
                'name' => 'Arnoldo Gabaldón',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 905,
                'name' => 'Bolivia',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 906,
                'name' => 'Carrillo',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 907,
                'name' => 'Cegarra',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 908,
                'name' => 'Chejendé',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 909,
                'name' => 'Manuel Salvador Ulloa',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 910,
                'name' => 'San José',
                'city_id' => 373,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 911,
                'name' => 'Carache',
                'city_id' => 374,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 912,
                'name' => 'La Concepción',
                'city_id' => 374,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 913,
                'name' => 'Cuicas',
                'city_id' => 374,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 914,
                'name' => 'Panamericana',
                'city_id' => 374,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 915,
                'name' => 'Santa Cruz',
                'city_id' => 374,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 916,
                'name' => 'Escuque',
                'city_id' => 375,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 917,
                'name' => 'La Unión',
                'city_id' => 375,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 918,
                'name' => 'Santa Rita',
                'city_id' => 375,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 919,
                'name' => 'Sabana Libre',
                'city_id' => 375,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 920,
                'name' => 'El Socorro',
                'city_id' => 376,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 921,
                'name' => 'Los Caprichos',
                'city_id' => 376,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 922,
                'name' => 'Antonio José de Sucre',
                'city_id' => 376,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 923,
                'name' => 'Campo Elías',
                'city_id' => 377,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 924,
                'name' => 'Arnoldo Gabaldón',
                'city_id' => 377,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 925,
                'name' => 'Santa Apolonia',
                'city_id' => 378,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 926,
                'name' => 'El Progreso',
                'city_id' => 378,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 927,
                'name' => 'La Ceiba',
                'city_id' => 378,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 928,
                'name' => 'Tres de Febrero',
                'city_id' => 378,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 929,
                'name' => 'El Dividive',
                'city_id' => 379,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 930,
                'name' => 'Agua Santa',
                'city_id' => 379,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 931,
                'name' => 'Agua Caliente',
                'city_id' => 379,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 932,
                'name' => 'El Cenizo',
                'city_id' => 379,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 933,
                'name' => 'Valerita',
                'city_id' => 379,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 934,
                'name' => 'Monte Carmelo',
                'city_id' => 380,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 935,
                'name' => 'Buena Vista',
                'city_id' => 380,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 936,
                'name' => 'Santa María del Horcón',
                'city_id' => 380,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 937,
                'name' => 'Motatán',
                'city_id' => 381,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 938,
                'name' => 'El Baño',
                'city_id' => 381,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 939,
                'name' => 'Jalisco',
                'city_id' => 381,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 940,
                'name' => 'Pampán',
                'city_id' => 382,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 941,
                'name' => 'Flor de Patria',
                'city_id' => 382,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 942,
                'name' => 'La Paz',
                'city_id' => 382,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 943,
                'name' => 'Santa Ana',
                'city_id' => 382,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 944,
                'name' => 'Pampanito',
                'city_id' => 383,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 945,
                'name' => 'La Concepción',
                'city_id' => 383,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 946,
                'name' => 'Pampanito II',
                'city_id' => 383,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 947,
                'name' => 'Betijoque',
                'city_id' => 384,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 948,
                'name' => 'José Gregorio Hernández',
                'city_id' => 384,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 949,
                'name' => 'La Pueblita',
                'city_id' => 384,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 950,
                'name' => 'Los Cedros',
                'city_id' => 384,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 951,
                'name' => 'Carvajal',
                'city_id' => 385,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 952,
                'name' => 'Campo Alegre',
                'city_id' => 385,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 953,
                'name' => 'Antonio Nicolás Briceño',
                'city_id' => 385,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 954,
                'name' => 'José Leonardo Suárez',
                'city_id' => 385,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 955,
                'name' => 'Sabana de Mendoza',
                'city_id' => 386,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 956,
                'name' => 'Junín',
                'city_id' => 386,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 957,
                'name' => 'Valmore Rodríguez',
                'city_id' => 386,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 958,
                'name' => 'El Paraíso',
                'city_id' => 386,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 959,
                'name' => 'Andrés Linares',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 960,
                'name' => 'Chiquinquirá',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 961,
                'name' => 'Cristóbal Mendoza',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 962,
                'name' => 'Cruz Carrillo',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 963,
                'name' => 'Matriz',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 964,
                'name' => 'Monseñor Carrillo',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 965,
                'name' => 'Tres Esquinas',
                'city_id' => 387,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 966,
                'name' => 'Cabimbú',
                'city_id' => 388,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 967,
                'name' => 'Jajó',
                'city_id' => 388,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 968,
                'name' => 'La Mesa de Esnujaque',
                'city_id' => 388,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 969,
                'name' => 'Santiago',
                'city_id' => 388,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 970,
                'name' => 'Tuñame',
                'city_id' => 388,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 971,
                'name' => 'La Quebrada',
                'city_id' => 388,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 972,
                'name' => 'Juan Ignacio Montilla',
                'city_id' => 389,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 973,
                'name' => 'La Beatriz',
                'city_id' => 389,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 974,
                'name' => 'La Puerta',
                'city_id' => 389,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 975,
                'name' => 'Mendoza del Valle de Momboy',
                'city_id' => 389,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 976,
                'name' => 'Mercedes Díaz',
                'city_id' => 389,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 977,
                'name' => 'San Luis',
                'city_id' => 389,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 978,
                'name' => 'Caraballeda',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 979,
                'name' => 'Carayaca',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 980,
                'name' => 'Carlos Soublette',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 981,
                'name' => 'Caruao Chuspa',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 982,
                'name' => 'Catia La Mar',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 983,
                'name' => 'El Junko',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 984,
                'name' => 'La Guaira',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 985,
                'name' => 'Macuto',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 986,
                'name' => 'Maiquetía',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 987,
                'name' => 'Naiguatá',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 988,
                'name' => 'Urimare',
                'city_id' => 390,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 989,
                'name' => 'Arístides Bastidas',
                'city_id' => 391,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 990,
                'name' => 'Bolívar',
                'city_id' => 392,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 991,
                'name' => 'Chivacoa',
                'city_id' => 407,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 992,
                'name' => 'Campo Elías',
                'city_id' => 407,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 993,
                'name' => 'Cocorote',
                'city_id' => 408,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 994,
                'name' => 'Independencia',
                'city_id' => 409,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 995,
                'name' => 'José Antonio Páez',
                'city_id' => 410,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 996,
                'name' => 'La Trinidad',
                'city_id' => 411,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 997,
                'name' => 'Manuel Monge',
                'city_id' => 412,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 998,
                'name' => 'Salóm',
                'city_id' => 413,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 999,
                'name' => 'Temerla',
                'city_id' => 413,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 1000,
                'name' => 'Nirgua',
                'city_id' => 413,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 1001,
                'name' => 'San Andrés',
                'city_id' => 414,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1002,
                'name' => 'Yaritagua',
                'city_id' => 414,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 1003,
                'name' => 'San Javier',
                'city_id' => 415,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 1004,
                'name' => 'Albarico',
                'city_id' => 415,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 1005,
                'name' => 'San Felipe',
                'city_id' => 415,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 1006,
                'name' => 'Sucre',
                'city_id' => 416,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 1007,
                'name' => 'Urachiche',
                'city_id' => 417,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1008,
                'name' => 'El Guayabo',
                'city_id' => 418,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 1009,
                'name' => 'Farriar',
                'city_id' => 418,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 1010,
                'name' => 'Isla de Toas',
                'city_id' => 441,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 1011,
                'name' => 'Monagas',
                'city_id' => 441,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 1012,
                'name' => 'San Timoteo',
                'city_id' => 442,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 1013,
                'name' => 'General Urdaneta',
                'city_id' => 442,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 1014,
                'name' => 'Libertador',
                'city_id' => 442,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 1015,
                'name' => 'Marcelino Briceño',
                'city_id' => 442,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 1016,
                'name' => 'Pueblo Nuevo',
                'city_id' => 442,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 1017,
                'name' => 'Manuel Guanipa Matos',
                'city_id' => 442,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 1018,
                'name' => 'Ambrosio',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 1019,
                'name' => 'Carmen Herrera',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 1020,
                'name' => 'La Rosa',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 1021,
                'name' => 'Germán Ríos Linares',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 1022,
                'name' => 'San Benito',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 1023,
                'name' => 'Rómulo Betancourt',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 1024,
                'name' => 'Jorge Hernández',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 1025,
                'name' => 'Punta Gorda',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 1026,
                'name' => 'Arístides Calvani',
                'city_id' => 443,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 1027,
                'name' => 'Encontrados',
                'city_id' => 444,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 1028,
                'name' => 'Udón Pérez',
                'city_id' => 444,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1029,
                'name' => 'Moralito',
                'city_id' => 445,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 1030,
                'name' => 'San Carlos del Zulia',
                'city_id' => 445,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 1031,
                'name' => 'Santa Cruz del Zulia',
                'city_id' => 445,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 1032,
                'name' => 'Santa Bárbara',
                'city_id' => 445,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 1033,
                'name' => 'Urribarrí',
                'city_id' => 445,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 1034,
                'name' => 'Carlos Quevedo',
                'city_id' => 446,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 1035,
                'name' => 'Francisco Javier Pulgar',
                'city_id' => 446,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 1036,
                'name' => 'Simón Rodríguez',
                'city_id' => 446,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 1037,
                'name' => 'Guamo-Gavilanes',
                'city_id' => 446,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 1038,
                'name' => 'La Concepción',
                'city_id' => 448,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 1039,
                'name' => 'San José',
                'city_id' => 448,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 1040,
                'name' => 'Mariano Parra León',
                'city_id' => 448,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 1041,
                'name' => 'José Ramón Yépez',
                'city_id' => 448,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 1042,
                'name' => 'Jesús María Semprún',
                'city_id' => 449,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 1043,
                'name' => 'Barí',
                'city_id' => 449,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 1044,
                'name' => 'Concepción',
                'city_id' => 450,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 1045,
                'name' => 'Andrés Bello',
                'city_id' => 450,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 1046,
                'name' => 'Chiquinquirá',
                'city_id' => 450,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 1047,
                'name' => 'El Carmelo',
                'city_id' => 450,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 1048,
                'name' => 'Potreritos',
                'city_id' => 450,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 1049,
                'name' => 'Libertad',
                'city_id' => 451,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 1050,
                'name' => 'Alonso de Ojeda',
                'city_id' => 451,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 1051,
                'name' => 'Venezuela',
                'city_id' => 451,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 1052,
                'name' => 'Eleazar López Contreras',
                'city_id' => 451,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 1053,
                'name' => 'Campo Lara',
                'city_id' => 451,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 1054,
                'name' => 'Bartolomé de las Casas',
                'city_id' => 452,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 1055,
                'name' => 'Libertad',
                'city_id' => 452,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 1056,
                'name' => 'Río Negro',
                'city_id' => 452,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 1057,
                'name' => 'San José de Perijá',
                'city_id' => 452,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 1058,
                'name' => 'San Rafael',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 1059,
                'name' => 'La Sierrita',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 1060,
                'name' => 'Las Parcelas',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 1061,
                'name' => 'Luis de Vicente',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 1062,
                'name' => 'Monseñor Marcos Sergio Godoy',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 1063,
                'name' => 'Ricaurte',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 1064,
                'name' => 'Tamare',
                'city_id' => 453,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 1065,
                'name' => 'Antonio Borjas Romero',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 1066,
                'name' => 'Bolívar',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 1067,
                'name' => 'Cacique Mara',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 1068,
                'name' => 'Carracciolo Parra Pérez',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 1069,
                'name' => 'Cecilio Acosta',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 1070,
                'name' => 'Cristo de Aranza',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 1071,
                'name' => 'Coquivacoa',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 1072,
                'name' => 'Chiquinquirá',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 1073,
                'name' => 'Francisco Eugenio Bustamante',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 1074,
                'name' => 'Idelfonzo Vásquez',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 1075,
                'name' => 'Juana de Ávila',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 1076,
                'name' => 'Luis Hurtado Higuera',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 1077,
                'name' => 'Manuel Dagnino',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 1078,
                'name' => 'Olegario Villalobos',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 1079,
                'name' => 'Raúl Leoni',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 1080,
                'name' => 'Santa Lucía',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 1081,
                'name' => 'Venancio Pulgar',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 1082,
                'name' => 'San Isidro',
                'city_id' => 454,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 1083,
                'name' => 'Altagracia',
                'city_id' => 455,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 1084,
                'name' => 'Faría',
                'city_id' => 455,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 1085,
                'name' => 'Ana María Campos',
                'city_id' => 455,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 1086,
                'name' => 'San Antonio',
                'city_id' => 455,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 1087,
                'name' => 'San José',
                'city_id' => 455,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 1088,
                'name' => 'Donaldo García',
                'city_id' => 456,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 1089,
                'name' => 'El Rosario',
                'city_id' => 456,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 1090,
                'name' => 'Sixto Zambrano',
                'city_id' => 456,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 1091,
                'name' => 'San Francisco',
                'city_id' => 457,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 1092,
                'name' => 'El Bajo',
                'city_id' => 457,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 1093,
                'name' => 'Domitila Flores',
                'city_id' => 457,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 1094,
                'name' => 'Francisco Ochoa',
                'city_id' => 457,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 1095,
                'name' => 'Los Cortijos',
                'city_id' => 457,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 1096,
                'name' => 'Marcial Hernández',
                'city_id' => 457,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 1097,
                'name' => 'Santa Rita',
                'city_id' => 458,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 1098,
                'name' => 'El Mene',
                'city_id' => 458,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 1099,
                'name' => 'Pedro Lucas Urribarrí',
                'city_id' => 458,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 1100,
                'name' => 'José Cenobio Urribarrí',
                'city_id' => 458,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('parishes')->insert(array (
            0 => 
            array (
                'id' => 1101,
                'name' => 'Rafael Maria Baralt',
                'city_id' => 459,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1102,
                'name' => 'Manuel Manrique',
                'city_id' => 459,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 1103,
                'name' => 'Rafael Urdaneta',
                'city_id' => 459,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 1104,
                'name' => 'Bobures',
                'city_id' => 460,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 1105,
                'name' => 'Gibraltar',
                'city_id' => 460,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 1106,
                'name' => 'Heras',
                'city_id' => 460,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 1107,
                'name' => 'Monseñor Arturo Álvarez',
                'city_id' => 460,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1108,
                'name' => 'Rómulo Gallegos',
                'city_id' => 460,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 1109,
                'name' => 'El Batey',
                'city_id' => 460,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 1110,
                'name' => 'Rafael Urdaneta',
                'city_id' => 461,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 1111,
                'name' => 'La Victoria',
                'city_id' => 461,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 1112,
                'name' => 'Raúl Cuenca',
                'city_id' => 461,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 1113,
                'name' => 'Sinamaica',
                'city_id' => 447,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 1114,
                'name' => 'Alta Guajira',
                'city_id' => 447,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 1115,
                'name' => 'Elías Sánchez Rubio',
                'city_id' => 447,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 1116,
                'name' => 'Guajira',
                'city_id' => 447,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 1117,
                'name' => 'Altagracia',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 1118,
                'name' => 'Antímano',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 1119,
                'name' => 'Caricuao',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 1120,
                'name' => 'Catedral',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 1121,
                'name' => 'Coche',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 1122,
                'name' => 'El Junquito',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 1123,
                'name' => 'El Paraíso',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 1124,
                'name' => 'El Recreo',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 1125,
                'name' => 'El Valle',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 1126,
                'name' => 'La Candelaria',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 1127,
                'name' => 'La Pastora',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 1128,
                'name' => 'La Vega',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1129,
                'name' => 'Macarao',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 1130,
                'name' => 'San Agustín',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 1131,
                'name' => 'San Bernardino',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 1132,
                'name' => 'San José',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 1133,
                'name' => 'San Juan',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 1134,
                'name' => 'San Pedro',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 1135,
                'name' => 'Santa Rosalía',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 1136,
                'name' => 'Santa Teresa',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 1137,
            'name' => 'Sucre (Catia)',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 1138,
                'name' => '23 de enero',
                'city_id' => 462,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
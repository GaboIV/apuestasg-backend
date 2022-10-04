<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alto Orinoco',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Atabapo',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Atures',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Autana',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Manapiare',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Maroa',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Río Negro',
                'state_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Anaco',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Aragua',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Manuel Ezequiel Bruzual',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Diego Bautista Urbaneja',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Fernando Peñalver',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Francisco Del Carmen Carvajal',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'General Sir Arthur McGregor',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Guanta',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Independencia',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'José Gregorio Monagas',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Juan Antonio Sotillo',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Juan Manuel Cajigal',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Libertad',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Francisco de Miranda',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Pedro María Freites',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Píritu',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'San José de Guanipa',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'San Juan de Capistrano',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Santa Ana',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Simón Bolívar',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Simón Rodríguez',
                'state_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Achaguas',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Biruaca',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Muñóz',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Páez',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Pedro Camejo',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Rómulo Gallegos',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'San Fernando',
                'state_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Atanasio Girardot',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Bolívar',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Camatagua',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Francisco Linares Alcántara',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'José Ángel Lamas',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'José Félix Ribas',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'José Rafael Revenga',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Libertador',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Mario Briceño Iragorry',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Ocumare de la Costa de Oro',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'San Casimiro',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'San Sebastián',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Santiago Mariño',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Santos Michelena',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Sucre',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Tovar',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Urdaneta',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Zamora',
                'state_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Alberto Arvelo Torrealba',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Andrés Eloy Blanco',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Antonio José de Sucre',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Arismendi',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Barinas',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Bolívar',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Cruz Paredes',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Ezequiel Zamora',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Obispos',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Pedraza',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Rojas',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Sosa',
                'state_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Caroní',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Cedeño',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'El Callao',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Gran Sabana',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Heres',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Piar',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
            'name' => 'Angostura (Raúl Leoni)',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Roscio',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Sifontes',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Sucre',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Padre Pedro Chien',
                'state_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Bejuma',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Carlos Arvelo',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Diego Ibarra',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Guacara',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Juan José Mora',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Libertador',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Los Guayos',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Miranda',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Montalbán',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Naguanagua',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Puerto Cabello',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'San Diego',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'San Joaquín',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Valencia',
                'state_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Anzoátegui',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Tinaquillo',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Girardot',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Lima Blanco',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Pao de San Juan Bautista',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Ricaurte',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Rómulo Gallegos',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'San Carlos',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Tinaco',
                'state_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Antonio Díaz',
                'state_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 101,
                'name' => 'Casacoima',
                'state_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 102,
                'name' => 'Pedernales',
                'state_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 103,
                'name' => 'Tucupita',
                'state_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 104,
                'name' => 'Acosta',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 105,
                'name' => 'Bolívar',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 106,
                'name' => 'Buchivacoa',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 107,
                'name' => 'Cacique Manaure',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 108,
                'name' => 'Carirubana',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 109,
                'name' => 'Colina',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 110,
                'name' => 'Dabajuro',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 111,
                'name' => 'Democracia',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 112,
                'name' => 'Falcón',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 113,
                'name' => 'Federación',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 114,
                'name' => 'Jacura',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 115,
                'name' => 'José Laurencio Silva',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 116,
                'name' => 'Los Taques',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 117,
                'name' => 'Mauroa',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 118,
                'name' => 'Miranda',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 119,
                'name' => 'Monseñor Iturriza',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 120,
                'name' => 'Palmasola',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 121,
                'name' => 'Petit',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 122,
                'name' => 'Píritu',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 123,
                'name' => 'San Francisco',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 124,
                'name' => 'Sucre',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 125,
                'name' => 'Tocópero',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 126,
                'name' => 'Unión',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 127,
                'name' => 'Urumaco',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 128,
                'name' => 'Zamora',
                'state_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 129,
                'name' => 'Camaguán',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 130,
                'name' => 'Chaguaramas',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 131,
                'name' => 'El Socorro',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 132,
                'name' => 'José Félix Ribas',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 133,
                'name' => 'José Tadeo Monagas',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 134,
                'name' => 'Juan Germán Roscio',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 135,
                'name' => 'Julián Mellado',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 136,
                'name' => 'Las Mercedes',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 137,
                'name' => 'Leonardo Infante',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 138,
                'name' => 'Pedro Zaraza',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 139,
                'name' => 'Ortíz',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 140,
                'name' => 'San Gerónimo de Guayabal',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 141,
                'name' => 'San José de Guaribe',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 142,
                'name' => 'Santa María de Ipire',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 143,
                'name' => 'Sebastián Francisco de Miranda',
                'state_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 144,
                'name' => 'Andrés Eloy Blanco',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 145,
                'name' => 'Crespo',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 146,
                'name' => 'Iribarren',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 147,
                'name' => 'Jiménez',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 148,
                'name' => 'Morán',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 149,
                'name' => 'Palavecino',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 150,
                'name' => 'Simón Planas',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 151,
                'name' => 'Torres',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 152,
                'name' => 'Urdaneta',
                'state_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 179,
                'name' => 'Alberto Adriani',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 180,
                'name' => 'Andrés Bello',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 181,
                'name' => 'Antonio Pinto Salinas',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 182,
                'name' => 'Aricagua',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 183,
                'name' => 'Arzobispo Chacón',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 184,
                'name' => 'Campo Elías',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 185,
                'name' => 'Caracciolo Parra Olmedo',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 186,
                'name' => 'Cardenal Quintero',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 187,
                'name' => 'Guaraque',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 188,
                'name' => 'Julio César Salas',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 189,
                'name' => 'Justo Briceño',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 190,
                'name' => 'Libertador',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 191,
                'name' => 'Miranda',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 192,
                'name' => 'Obispo Ramos de Lora',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 193,
                'name' => 'Padre Noguera',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 194,
                'name' => 'Pueblo Llano',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 195,
                'name' => 'Rangel',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 196,
                'name' => 'Rivas Dávila',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 197,
                'name' => 'Santos Marquina',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 198,
                'name' => 'Sucre',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 199,
                'name' => 'Tovar',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 200,
                'name' => 'Tulio Febres Cordero',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 201,
                'name' => 'Zea',
                'state_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 223,
                'name' => 'Acevedo',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 224,
                'name' => 'Andrés Bello',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 225,
                'name' => 'Baruta',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 226,
                'name' => 'Brión',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 227,
                'name' => 'Buroz',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 228,
                'name' => 'Carrizal',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 229,
                'name' => 'Chacao',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 230,
                'name' => 'Cristóbal Rojas',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 231,
                'name' => 'El Hatillo',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 232,
                'name' => 'Guaicaipuro',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 233,
                'name' => 'Independencia',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 234,
                'name' => 'Lander',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 235,
                'name' => 'Los Salias',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 236,
                'name' => 'Páez',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 237,
                'name' => 'Paz Castillo',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 238,
                'name' => 'Pedro Gual',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 239,
                'name' => 'Plaza',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 240,
                'name' => 'Simón Bolívar',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 241,
                'name' => 'Sucre',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 242,
                'name' => 'Urdaneta',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 243,
                'name' => 'Zamora',
                'state_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 258,
                'name' => 'Acosta',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 259,
                'name' => 'Aguasay',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 260,
                'name' => 'Bolívar',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 261,
                'name' => 'Caripe',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 262,
                'name' => 'Cedeño',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 263,
                'name' => 'Ezequiel Zamora',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 264,
                'name' => 'Libertador',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 265,
                'name' => 'Maturín',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 266,
                'name' => 'Piar',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 267,
                'name' => 'Punceres',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 268,
                'name' => 'Santa Bárbara',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 269,
                'name' => 'Sotillo',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 270,
                'name' => 'Uracoa',
                'state_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 271,
                'name' => 'Antolín del Campo',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 272,
                'name' => 'Arismendi',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 273,
                'name' => 'García',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 274,
                'name' => 'Gómez',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 275,
                'name' => 'Maneiro',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 276,
                'name' => 'Marcano',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 277,
                'name' => 'Mariño',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 278,
                'name' => 'Península de Macanao',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 279,
                'name' => 'Tubores',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 280,
                'name' => 'Villalba',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 281,
                'name' => 'Díaz',
                'state_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 282,
                'name' => 'Agua Blanca',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 283,
                'name' => 'Araure',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 284,
                'name' => 'Esteller',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 285,
                'name' => 'Guanare',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 286,
                'name' => 'Guanarito',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 287,
                'name' => 'Monseñor José Vicente de Unda',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 288,
                'name' => 'Ospino',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 289,
                'name' => 'Páez',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 290,
                'name' => 'Papelón',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 291,
                'name' => 'San Genaro de Boconoíto',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 292,
                'name' => 'San Rafael de Onoto',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 293,
                'name' => 'Santa Rosalía',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 294,
                'name' => 'Sucre',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 295,
                'name' => 'Turén',
                'state_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 296,
                'name' => 'Andrés Eloy Blanco',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 297,
                'name' => 'Andrés Mata',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 298,
                'name' => 'Arismendi',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 299,
                'name' => 'Benítez',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 300,
                'name' => 'Bermúdez',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 301,
                'name' => 'Bolívar',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 302,
                'name' => 'Cajigal',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 303,
                'name' => 'Cruz Salmerón Acosta',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 304,
                'name' => 'Libertador',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 305,
                'name' => 'Mariño',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 306,
                'name' => 'Mejía',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 307,
                'name' => 'Montes',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 308,
                'name' => 'Ribero',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 309,
                'name' => 'Sucre',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 310,
                'name' => 'Valdéz',
                'state_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 341,
                'name' => 'Andrés Bello',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 342,
                'name' => 'Antonio Rómulo Costa',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 343,
                'name' => 'Ayacucho',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 344,
                'name' => 'Bolívar',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 345,
                'name' => 'Cárdenas',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 346,
                'name' => 'Córdoba',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 347,
                'name' => 'Fernández Feo',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 348,
                'name' => 'Francisco de Miranda',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 349,
                'name' => 'García de Hevia',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 350,
                'name' => 'Guásimos',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 351,
                'name' => 'Independencia',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 352,
                'name' => 'Jáuregui',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 353,
                'name' => 'José María Vargas',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 354,
                'name' => 'Junín',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 355,
                'name' => 'Libertad',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 356,
                'name' => 'Libertador',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 357,
                'name' => 'Lobatera',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 358,
                'name' => 'Michelena',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 359,
                'name' => 'Panamericano',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 360,
                'name' => 'Pedro María Ureña',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 361,
                'name' => 'Rafael Urdaneta',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 362,
                'name' => 'Samuel Darío Maldonado',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 363,
                'name' => 'San Cristóbal',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 364,
                'name' => 'Seboruco',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 365,
                'name' => 'Simón Rodríguez',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 366,
                'name' => 'Sucre',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 367,
                'name' => 'Torbes',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 368,
                'name' => 'Uribante',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 369,
                'name' => 'San Judas Tadeo',
                'state_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 370,
                'name' => 'Andrés Bello',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 371,
                'name' => 'Boconó',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 372,
                'name' => 'Bolívar',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 373,
                'name' => 'Candelaria',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 374,
                'name' => 'Carache',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 375,
                'name' => 'Escuque',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 376,
                'name' => 'José Felipe Márquez Cañizalez',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 377,
                'name' => 'Juan Vicente Campos Elías',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 378,
                'name' => 'La Ceiba',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 379,
                'name' => 'Miranda',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 380,
                'name' => 'Monte Carmelo',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 381,
                'name' => 'Motatán',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 382,
                'name' => 'Pampán',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 383,
                'name' => 'Pampanito',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 384,
                'name' => 'Rafael Rangel',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 385,
                'name' => 'San Rafael de Carvajal',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 386,
                'name' => 'Sucre',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 387,
                'name' => 'Trujillo',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 388,
                'name' => 'Urdaneta',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 389,
                'name' => 'Valera',
                'state_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 390,
                'name' => 'Vargas',
                'state_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 391,
                'name' => 'Arístides Bastidas',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 392,
                'name' => 'Bolívar',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 407,
                'name' => 'Bruzual',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 408,
                'name' => 'Cocorote',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 409,
                'name' => 'Independencia',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 410,
                'name' => 'José Antonio Páez',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 411,
                'name' => 'La Trinidad',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 412,
                'name' => 'Manuel Monge',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 413,
                'name' => 'Nirgua',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 414,
                'name' => 'Peña',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 415,
                'name' => 'San Felipe',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 416,
                'name' => 'Sucre',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 417,
                'name' => 'Urachiche',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 418,
                'name' => 'José Joaquín Veroes',
                'state_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 441,
                'name' => 'Almirante Padilla',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 442,
                'name' => 'Baralt',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 443,
                'name' => 'Cabimas',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 444,
                'name' => 'Catatumbo',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 445,
                'name' => 'Colón',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 446,
                'name' => 'Francisco Javier Pulgar',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 447,
                'name' => 'Páez',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 448,
                'name' => 'Jesús Enrique Losada',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 449,
                'name' => 'Jesús María Semprún',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 450,
                'name' => 'La Cañada de Urdaneta',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 451,
                'name' => 'Lagunillas',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 452,
                'name' => 'Machiques de Perijá',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 453,
                'name' => 'Mara',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 454,
                'name' => 'Maracaibo',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 455,
                'name' => 'Miranda',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 456,
                'name' => 'Rosario de Perijá',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 457,
                'name' => 'San Francisco',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 458,
                'name' => 'Santa Rita',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 459,
                'name' => 'Simón Bolívar',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 460,
                'name' => 'Sucre',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 461,
                'name' => 'Valmore Rodríguez',
                'state_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 462,
                'name' => 'Libertador',
                'state_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
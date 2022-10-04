<?php

use Illuminate\Database\Seeder;

class RacecoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('racecourses')->delete();
        
        \DB::table('racecourses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Valencia',
                'location' => '231',
                'acro' => 'va',
                'origin' => 'agsr',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'La Rinconada',
                'location' => '231',
                'acro' => 'lr',
                'origin' => 'agsr',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rancho Alegre',
                'location' => '231',
                'acro' => 'ra',
                'origin' => 'agsr',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'AUS - Wagga',
                'location' => '14',
                'acro' => 'AUS-AUD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'AUS - Seymour',
                'location' => '14',
                'acro' => 'AUS-AUS',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=aus&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Ladbrokes Park Lakeside',
                'location' => '14',
                'acro' => 'AUS-SNL',
                'origin' => 'twinspires',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'AUS - Ballina',
                'location' => '14',
                'acro' => 'AUS-AUC',
                'origin' => 'twinspires',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'JPN Tokyo City',
                'location' => '112',
                'acro' => 'oi',
                'origin' => 'twinspires',
                'url' => 'https://xpbapi.drf.com/races/2020-05-19/track/JPN-OI',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Sha Tin',
                'location' => '93',
                'acro' => 'HK-ST',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Gulfstream Park',
                'location' => '226',
                'acro' => 'GP',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=gp&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Oaklawn Park',
                'location' => '226',
                'acro' => 'op',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=op&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Remington Park',
                'location' => '226',
                'acro' => 'RP',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=rp&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Tampa Bay Downs',
                'location' => '226',
                'acro' => 'TAM',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=tam&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            13 => 
            array (
                'id' => 18,
                'name' => 'Los Alamitos QH',
                'location' => '226',
                'acro' => 'LA',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=la&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            14 => 
            array (
                'id' => 19,
                'name' => 'Fonner Park',
                'location' => '226',
                'acro' => 'FON',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=fon&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            15 => 
            array (
                'id' => 20,
                'name' => 'JPN Kawasaki',
                'location' => '112',
                'acro' => 'kaw',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=kaw&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            16 => 
            array (
                'id' => 21,
                'name' => 'Santa Anita',
                'location' => '226',
                'acro' => 'SA',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=sa&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            17 => 
            array (
                'id' => 22,
                'name' => 'Golden Gate Fields',
                'location' => '226',
                'acro' => 'GG',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=gg&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            18 => 
            array (
                'id' => 23,
                'name' => 'Maroñas de Uruguay',
                'location' => '227',
                'acro' => 'mrn',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=mrn&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            19 => 
            array (
                'id' => 24,
                'name' => 'Churchill Downs',
                'location' => '226',
                'acro' => 'CD',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=cd&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            20 => 
            array (
                'id' => 25,
                'name' => 'Charles Town',
                'location' => '226',
                'acro' => 'CT',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=ct&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            21 => 
            array (
                'id' => 26,
                'name' => 'Pimlico Simulcast',
                'location' => '226',
                'acro' => 'pim',
                'origin' => 'twinspires',
                'url' => 'https://www.twinspires.com/adw/legacy/tote/getAllRaces?username=my_tux&track=pim&type=Thoroughbred',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            22 => 
            array (
                'id' => 27,
                'name' => 'Lone Star Park',
                'location' => '226',
                'acro' => 'LS',
                'origin' => 'DRF',
                'url' => '',
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            23 => 
            array (
                'id' => 28,
                'name' => 'Ruidoso Downs',
                'location' => '226',
                'acro' => 'RUI',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            24 => 
            array (
                'id' => 29,
                'name' => 'AUS - Townsville',
                'location' => '14',
                'acro' => 'AUS-AUB',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            25 => 
            array (
                'id' => 30,
                'name' => 'Port Augusta',
                'location' => '14',
                'acro' => 'AUS-PTA',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            26 => 
            array (
                'id' => 31,
                'name' => 'Deauville',
                'location' => '73',
                'acro' => 'FRA-DEA',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            27 => 
            array (
                'id' => 32,
                'name' => 'Assiniboia Downs',
                'location' => '38',
                'acro' => 'ASD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            28 => 
            array (
                'id' => 33,
                'name' => 'Chateaubriant',
                'location' => '73',
                'acro' => 'FRA-CHT',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            29 => 
            array (
                'id' => 34,
                'name' => 'Lyon Parilly',
                'location' => '73',
                'acro' => 'FRA-LYP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            30 => 
            array (
                'id' => 35,
                'name' => 'Laurel Park',
                'location' => '226',
                'acro' => 'LRL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            31 => 
            array (
                'id' => 36,
                'name' => 'Toulouse La Cepiere',
                'location' => '73',
                'acro' => 'FRA-TOU',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            32 => 
            array (
                'id' => 37,
                'name' => 'Mountaineer Park',
                'location' => '226',
                'acro' => 'MNR',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            33 => 
            array (
                'id' => 38,
                'name' => 'Belmont Park',
                'location' => '226',
                'acro' => 'BEL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            34 => 
            array (
                'id' => 39,
                'name' => 'Woodbine',
                'location' => '38',
                'acro' => 'WO',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            35 => 
            array (
                'id' => 40,
                'name' => 'Indiana Grand',
                'location' => '226',
                'acro' => 'IND',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            36 => 
            array (
                'id' => 41,
                'name' => 'Parx Racing',
                'location' => '226',
                'acro' => 'PRX',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            37 => 
            array (
                'id' => 42,
                'name' => 'Arapahoe Park',
                'location' => '226',
                'acro' => 'ARP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            38 => 
            array (
                'id' => 43,
                'name' => 'Canterbury Park',
                'location' => '226',
                'acro' => 'CBY',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            39 => 
            array (
                'id' => 44,
                'name' => 'Delaware Park',
                'location' => '226',
                'acro' => 'DEL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            40 => 
            array (
                'id' => 45,
                'name' => 'Fair Meadows Tulsa',
                'location' => '226',
                'acro' => 'FMT',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            41 => 
            array (
                'id' => 46,
                'name' => 'Fairmount Park',
                'location' => '226',
                'acro' => 'FP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            42 => 
            array (
                'id' => 47,
                'name' => 'Fort Erie',
                'location' => '38',
                'acro' => 'FE',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            43 => 
            array (
                'id' => 48,
                'name' => 'Hastings Park',
                'location' => '38',
                'acro' => 'HST',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            44 => 
            array (
                'id' => 49,
                'name' => 'Louisiana Downs',
                'location' => '226',
                'acro' => 'LAD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            45 => 
            array (
                'id' => 50,
                'name' => 'Prairie Meadows',
                'location' => '226',
                'acro' => 'PRM',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            46 => 
            array (
                'id' => 51,
                'name' => 'Thistledown',
                'location' => '226',
                'acro' => 'TDN',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            47 => 
            array (
                'id' => 52,
                'name' => 'Auteuil',
                'location' => '73',
                'acro' => 'FRA-AUT',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            48 => 
            array (
                'id' => 53,
                'name' => 'Saint Cloud',
                'location' => '73',
                'acro' => 'FRA-STC',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            49 => 
            array (
                'id' => 54,
                'name' => 'Killarney',
                'location' => '100',
                'acro' => 'IRE-KIL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            50 => 
            array (
                'id' => 55,
                'name' => 'Roscommon',
                'location' => '100',
                'acro' => 'IRE-ROS',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            51 => 
            array (
                'id' => 56,
                'name' => 'Durbanville',
                'location' => '240',
                'acro' => 'SAF-DRB',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            52 => 
            array (
                'id' => 57,
                'name' => 'Ayr',
                'location' => '104',
                'acro' => 'ENG-AYR',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            53 => 
            array (
                'id' => 58,
                'name' => 'Kempton',
                'location' => '104',
                'acro' => 'ENG-KEM',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            54 => 
            array (
                'id' => 59,
                'name' => 'Windsor',
                'location' => '104',
                'acro' => 'ENG-WDS',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-04-28 00:00:00',
                'updated_at' => '2020-04-28 00:00:00',
            ),
            55 => 
            array (
                'id' => 60,
                'name' => 'Keeneland',
                'location' => '226',
                'acro' => 'KEE',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            56 => 
            array (
                'id' => 61,
                'name' => 'Will Rogers Downs',
                'location' => '226',
                'acro' => 'WRD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            57 => 
            array (
                'id' => 62,
                'name' => 'Gulfstream Park West',
                'location' => '226',
                'acro' => 'GPW',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            58 => 
            array (
                'id' => 63,
                'name' => 'Zia Park',
                'location' => '226',
                'acro' => 'ZIA',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            59 => 
            array (
                'id' => 64,
                'name' => 'Monmouth Park',
                'location' => '226',
                'acro' => 'MTH',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            60 => 
            array (
                'id' => 65,
                'name' => 'Ajax Downs',
                'location' => '38',
                'acro' => 'AJX',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            61 => 
            array (
                'id' => 66,
                'name' => 'Albuquerque',
                'location' => '226',
                'acro' => 'ALB',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            62 => 
            array (
                'id' => 67,
                'name' => 'Arlington',
                'location' => '226',
                'acro' => 'AP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            63 => 
            array (
                'id' => 68,
                'name' => 'Belterra Park',
                'location' => '226',
                'acro' => 'BTP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            64 => 
            array (
                'id' => 69,
                'name' => 'Century Mile',
                'location' => '38',
                'acro' => 'CTM',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            65 => 
            array (
                'id' => 70,
                'name' => 'Columbus',
                'location' => '226',
                'acro' => 'CLS',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            66 => 
            array (
                'id' => 71,
                'name' => 'Cross Country',
                'location' => '226',
                'acro' => 'CCP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            67 => 
            array (
                'id' => 72,
                'name' => 'Del Mar',
                'location' => '226',
                'acro' => 'DMR',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            68 => 
            array (
                'id' => 73,
                'name' => 'Emerald Downs',
                'location' => '226',
                'acro' => 'EMD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            69 => 
            array (
                'id' => 74,
                'name' => 'Evangeline Downs',
                'location' => '226',
                'acro' => 'EVD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            70 => 
            array (
                'id' => 75,
                'name' => 'Finger Lakes',
                'location' => '226',
                'acro' => 'FL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            71 => 
            array (
                'id' => 76,
                'name' => 'Fort Pierre',
                'location' => '226',
                'acro' => 'FTP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            72 => 
            array (
                'id' => 77,
                'name' => 'Foxfield',
                'location' => '226',
                'acro' => 'FX',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            73 => 
            array (
                'id' => 78,
                'name' => 'Golden Hour',
                'location' => '226',
                'acro' => 'EQC',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            74 => 
            array (
                'id' => 79,
                'name' => 'Grants Pass',
                'location' => '226',
                'acro' => 'GRP',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            75 => 
            array (
                'id' => 80,
                'name' => 'Hawthorne',
                'location' => '226',
                'acro' => 'HAW',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            76 => 
            array (
                'id' => 81,
                'name' => 'Kentucky Downs',
                'location' => '226',
                'acro' => 'KD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            77 => 
            array (
                'id' => 82,
                'name' => 'Lethbridge',
                'location' => '38',
                'acro' => 'LBG',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            78 => 
            array (
                'id' => 83,
                'name' => 'Penn National',
                'location' => '226',
                'acro' => 'PEN',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            79 => 
            array (
                'id' => 84,
                'name' => 'Pocatello Downs',
                'location' => '226',
                'acro' => 'POD',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            80 => 
            array (
                'id' => 85,
                'name' => 'Presque Isle Downs',
                'location' => '226',
                'acro' => 'PID',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:26',
                'updated_at' => '2020-10-04 18:49:26',
            ),
            81 => 
            array (
                'id' => 86,
                'name' => 'Saratoga',
                'location' => '226',
                'acro' => 'SAR',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:27',
                'updated_at' => '2020-10-04 18:49:27',
            ),
            82 => 
            array (
                'id' => 87,
                'name' => 'Stronach Pick 5',
                'location' => '226',
                'acro' => 'EQA',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:27',
                'updated_at' => '2020-10-04 18:49:27',
            ),
            83 => 
            array (
                'id' => 88,
                'name' => 'Super Tuesday Pick 4',
                'location' => '226',
                'acro' => 'EQB',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:27',
                'updated_at' => '2020-10-04 18:49:27',
            ),
            84 => 
            array (
                'id' => 89,
                'name' => 'Sweetwater County Fair',
                'location' => '226',
                'acro' => 'SWF',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:27',
                'updated_at' => '2020-10-04 18:49:27',
            ),
            85 => 
            array (
                'id' => 90,
            'name' => 'The Everest (AUS)',
                'location' => '226',
                'acro' => 'SPL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-04 18:49:27',
                'updated_at' => '2020-10-04 18:49:27',
            ),
            86 => 
            array (
                'id' => 91,
                'name' => 'Atokad Downs',
                'location' => '226',
                'acro' => 'ATO',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-06 22:30:02',
                'updated_at' => '2020-10-06 22:30:02',
            ),
            87 => 
            array (
                'id' => 92,
                'name' => 'Middleburg',
                'location' => '226',
                'acro' => 'MID',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-08 07:30:02',
                'updated_at' => '2020-10-08 07:30:02',
            ),
            88 => 
            array (
                'id' => 93,
                'name' => 'Fair Play Park',
                'location' => '226',
                'acro' => 'FPL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-13 22:30:02',
                'updated_at' => '2020-10-13 22:30:02',
            ),
            89 => 
            array (
                'id' => 94,
                'name' => 'Horsemen\'s Park',
                'location' => '226',
                'acro' => 'HPO',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-13 22:30:02',
                'updated_at' => '2020-10-13 22:30:02',
            ),
            90 => 
            array (
                'id' => 95,
                'name' => 'Willowdale',
                'location' => '226',
                'acro' => 'WIL',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-14 22:30:03',
                'updated_at' => '2020-10-14 22:30:03',
            ),
            91 => 
            array (
                'id' => 96,
                'name' => 'Lincoln',
                'location' => '226',
                'acro' => 'LNN',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-20 22:30:02',
                'updated_at' => '2020-10-20 22:30:02',
            ),
            92 => 
            array (
                'id' => 97,
                'name' => 'Mahoning Valley',
                'location' => '226',
                'acro' => 'MVR',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-20 22:30:02',
                'updated_at' => '2020-10-20 22:30:02',
            ),
            93 => 
            array (
                'id' => 98,
                'name' => 'Great Meadow',
                'location' => '226',
                'acro' => 'GRM',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-23 22:30:02',
                'updated_at' => '2020-10-23 22:30:02',
            ),
            94 => 
            array (
                'id' => 99,
                'name' => 'Breeders Cup Adv',
                'location' => '226',
                'acro' => 'BC',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-28 22:30:02',
                'updated_at' => '2020-10-28 22:30:02',
            ),
            95 => 
            array (
                'id' => 100,
                'name' => 'Unionville',
                'location' => '226',
                'acro' => 'UNI',
                'origin' => 'DRF',
                'url' => NULL,
                'created_at' => '2020-10-28 22:30:02',
                'updated_at' => '2020-10-28 22:30:02',
            ),
        ));
        
        
    }
}
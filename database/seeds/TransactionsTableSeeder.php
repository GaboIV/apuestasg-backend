<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transactions')->delete();
        
        \DB::table('transactions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '4dcbd800eb',
                'amount' => '100000000000.00',
                'player_balance' => '400000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:34:06',
                'updated_at' => '2020-10-12 19:34:06',
            ),
            1 => 
            array (
                'id' => 2,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'dffb491cbc',
                'amount' => '100000000000.00',
                'player_balance' => '300000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:34:40',
                'updated_at' => '2020-10-12 19:34:40',
            ),
            2 => 
            array (
                'id' => 3,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '32b728dee1',
                'amount' => '100000000000.00',
                'player_balance' => '200000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:35:20',
                'updated_at' => '2020-10-12 19:35:20',
            ),
            3 => 
            array (
                'id' => 4,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'fa1053cf86',
                'amount' => '50000000000.00',
                'player_balance' => '150000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:35:57',
                'updated_at' => '2020-10-12 19:35:57',
            ),
            4 => 
            array (
                'id' => 5,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '5c4c050fc4',
                'amount' => '50000000000.00',
                'player_balance' => '100000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:36:13',
                'updated_at' => '2020-10-12 19:36:13',
            ),
            5 => 
            array (
                'id' => 6,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '1a24d0f756',
                'amount' => '50000000000.00',
                'player_balance' => '50000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:36:31',
                'updated_at' => '2020-10-12 19:36:31',
            ),
            6 => 
            array (
                'id' => 7,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'b91e65a979',
                'amount' => '45000000000.00',
                'player_balance' => '5000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-12 19:36:51',
                'updated_at' => '2020-10-12 19:36:51',
            ),
            7 => 
            array (
                'id' => 8,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '286b74d920',
                'amount' => '1000000000.00',
                'player_balance' => '4000000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-13 06:49:55',
                'updated_at' => '2020-10-13 06:49:55',
            ),
            8 => 
            array (
                'id' => 9,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'b807abd1ae',
                'amount' => '1000.00',
                'player_balance' => '3999999000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-13 06:50:16',
                'updated_at' => '2020-10-13 06:50:16',
            ),
            9 => 
            array (
                'id' => 10,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '4613d5d7e9',
                'amount' => '500000.00',
                'player_balance' => '2500000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-20 21:32:36',
                'updated_at' => '2020-10-20 21:32:36',
            ),
            10 => 
            array (
                'id' => 11,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'd610a8ee16',
                'amount' => '500000.00',
                'player_balance' => '2000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-20 21:33:00',
                'updated_at' => '2020-10-20 21:33:00',
            ),
            11 => 
            array (
                'id' => 12,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'f4d478f711',
                'amount' => '500000.00',
                'player_balance' => '1500000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-20 21:33:48',
                'updated_at' => '2020-10-20 21:33:48',
            ),
            12 => 
            array (
                'id' => 13,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => 'c0a30b78c0',
                'amount' => '500000.00',
                'player_balance' => '1000000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-20 21:34:19',
                'updated_at' => '2020-10-20 21:34:19',
            ),
            13 => 
            array (
                'id' => 14,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '2f4832913e',
                'amount' => '500000.00',
                'player_balance' => '500000.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-20 21:35:22',
                'updated_at' => '2020-10-20 21:35:22',
            ),
            14 => 
            array (
                'id' => 15,
                'event_type_id' => 1,
                'player_id' => 29,
                'ticket_id' => '34c7628bdc',
                'amount' => '500000.00',
                'player_balance' => '0.00',
                'user_admin' => NULL,
                'created_at' => '2020-10-20 21:35:48',
                'updated_at' => '2020-10-20 21:35:48',
            ),
        ));
        
        
    }
}
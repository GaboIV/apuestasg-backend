<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nick' => 'admin',
                'email' => 'admin@apuestasg.com',
                'status' => 1,
                'attemps' => 5,
                'web' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$WaBGQ.SCexDQAIKfIt8XuuFzf6hCkh.cw7GxYFnCmzPM4auQKfvp6',
                'code_security' => '0',
                'remember_token' => NULL,
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            1 => 
            array (
                'id' => 2,
                'nick' => 'master',
                'email' => 'master@apuestasg.com',
                'status' => 1,
                'attemps' => 5,
                'web' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$25SrPl/s64rP4A5u64sCge7gIdHRhdV8DuQV.SBgzE2GZnBUyOtzS',
                'code_security' => '0',
                'remember_token' => NULL,
                'created_at' => '2019-11-11 12:32:10',
                'updated_at' => '2019-11-11 12:32:10',
            ),
            2 => 
            array (
                'id' => 12,
                'nick' => 'simon1994',
                'email' => 'saimon2394@gmail.com',
                'status' => 1,
                'attemps' => 5,
                'web' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$Kmgoqpr4wR7Rf18IpwA/vuIEf5FqNoklwB8PMejhMKe.oe5w0AGxG',
                'code_security' => '$2y$10$ca3nQUi2GOndAeUI2DlbMOXMhsL8xM2u5xJf8ZfBL5OVNtwapc3pa',
                'remember_token' => NULL,
                'created_at' => '2020-06-23 20:17:34',
                'updated_at' => '2020-06-23 20:17:34',
            ),
            3 => 
            array (
                'id' => 30,
                'nick' => 'gaboiv',
                'email' => 'gabrielcaraballo1907@gmail.com',
                'status' => 1,
                'attemps' => 5,
                'web' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$y1eBVogB/lQP5cornnw7zeOmb9xW50P4JW01WLMHAmcSzDsCCiDnC',
                'code_security' => '$2y$10$jXJqYaANEFKPHJBsopynMu77aYJkKhQYIWQD7LeB9FuTwC7f/PJC6',
                'remember_token' => NULL,
                'created_at' => '2020-09-30 14:45:03',
                'updated_at' => '2020-09-30 14:45:03',
            ),
            4 => 
            array (
                'id' => 31,
                'nick' => 'carmenbompart22',
                'email' => 'carmenbompart22@gmail.com',
                'status' => 1,
                'attemps' => 5,
                'web' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$d/Df1z0j504khg0EZORhve..5q0ELIqE0Qp.QpFYhqANDv5A.G0qW',
                'code_security' => '$2y$10$LNKHOtbgixIHLSBJTEzZx.o5T/IKKmzi0e4V9vwaWhE2RRGVl5Jqi',
                'remember_token' => NULL,
                'created_at' => '2020-10-01 05:45:07',
                'updated_at' => '2020-10-01 05:45:07',
            ),
        ));
        
        
    }
}
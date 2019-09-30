<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Países
        DB::unprepared(file_get_contents(public_path() . '/seeds/countries.sql'));
        // Estados de Venezuela
        DB::unprepared(file_get_contents(public_path() . '/seeds/states.sql'));
        // Ciudades de Venezuela
        DB::unprepared(file_get_contents(public_path() . '/seeds/cities.sql'));
        // Parroquias de Venezuela
        DB::unprepared(file_get_contents(public_path() . '/seeds/parishes.sql'));

        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UsersSeeder::class);
    }
}

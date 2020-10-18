<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Fútbol';
        $category->acro_3 = 'FUT';
        $category->importance = '94';
        $category->save();

        $category = new Category();
        $category->name = 'Béisbol';
        $category->acro_3 = 'BEI';
        $category->importance = '95';
        $category->save();

        $category = new Category();
        $category->name = 'Baloncesto';
        $category->acro_3 = 'BAL';
        $category->importance = '90';
        $category->save();

        $category = new Category();
        $category->name = 'Tenis';
        $category->acro_3 = 'TEN';
        $category->importance = '85';
        $category->save();

        $category = new Category();
        $category->name = 'Fútbol americano';
        $category->acro_3 = 'FAM';
        $category->importance = '80';
        $category->save();

        $category = new Category();
        $category->name = 'Hockey';
        $category->acro_3 = 'HOC';
        $category->importance = '75';
        $category->save();

        $category = new Category();
        $category->name = 'Hipismo';
        $category->acro_3 = 'HIP';
        $category->importance = '88';
        $category->save();

        $category = new Category();
        $category->name = 'Rugby';
        $category->acro_3 = 'RUG';
        $category->importance = '70';
        $category->save();

        $category = new Category();
        $category->name = 'Boxeo';
        $category->acro_3 = 'BOX';
        $category->importance = '67';
        $category->save();

        $category = new Category();
        $category->name = 'MMA / UFC';
        $category->acro_3 = 'MMA';
        $category->importance = '65';
        $category->save();
    }
}

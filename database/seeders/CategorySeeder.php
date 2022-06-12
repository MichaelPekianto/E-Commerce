<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Hobi & Koleksi',
            'image'=>'images/category1image.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Sepatu Pria',
            'image' => 'images/category2image.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Elektronik',
            'image' => 'images/category3image.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Makanan & Minuman',
            'image' => 'images/category4image.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Pakaian Pria',
            'image' => 'images/category5image.jpg'
        ]);
    }
}

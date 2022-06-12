<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Hot Toys Spider Man',
            'category' => '1',
            'desc' => 'From The Movie Spider Man No Way Home Manufactured by Hot Toys with the Height of 2 meters ',
            'price' => '20000000',
            'stock' => '100',
            'shop_id' => '1',
            'image' => 'images/hottoys.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Onic X Patrobas Shoes',
            'category' => '2',
            'desc' => 'Exclusively designed using a blend of materials (canvas and suede / suede leather and full grain leather) with details on the top 2 eyelets of different colors as a representation of "The Eye of Onic" who looks sharply in the face of the "enemy" that is in front of us.',
            'price' => '500000',
            'stock' => '99',
            'shop_id'=>'2',
            'image' => 'images/shoes.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Smart Watch',
            'category' => '3',
            'desc' => 'Using BUILT IN AMAZON ALEXA & GPS so You can talk to Amazon Alexa on your Amazfit GTS 2 Mini Smart Watch. Ask questions, get translations, set alarms, and timers, create shopping lists, check the weather, control your smart home devices, and more. Get precise tracking on your daily steps, distance traveled, and calories burned thanks to integrated GPS.',
            'price' => '2500000',
            'stock' => '59',
            'shop_id' => '3',
            'image' => 'images/smartwatch.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Ovomaltine',
            'category' => '4',
            'desc' => 'A Crunchy Jam that made of Wafer and Chocolate',
            'price' => '20000',
            'stock' => '99',
            'shop_id' => '4',
            'image' => 'images/ovomaltine.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Uniqlo T-shirt',
            'category' => '5',
            'desc' => 'A Product From Uniqlo',
            'price' => '300000',
            'stock' => '99',
            'shop_id' => '5',
            'image' => 'images/t-shirt.jpg',
        ]);
    }
}

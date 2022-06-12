<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'name' => 'Toko1',
            'user_id' => '1',
            'desc'=> 'Toko ini menjual semua perlengkapan mainan dan hobi',
            'OpeningDay'=> 'Monday',
            'ClosingDay'=> 'Friday',
            'OpeningHours'=>'09:00',
            'ClosingHours'=>'17:00',
        ]);
        DB::table('shops')->insert([
            'name' => 'Toko2',
            'user_id' => '2',
            'desc' => 'Toko ini menjual semua sepatu',
            'OpeningDay' => 'Monday',
            'ClosingDay' => 'Sunday',
            'OpeningHours' => '09:00',
            'ClosingHours' => '20:00',
        ]);
        DB::table('shops')->insert([
            'name' => 'Toko3',
            'user_id' => '3',
            'desc' => 'Toko ini menjual semua perlengkapan elektronik',
            'OpeningDay' => 'Monday',
            'ClosingDay' => 'Friday',
            'OpeningHours' => '00:00',
            'ClosingHours' => '00:00',
        ]);
        DB::table('shops')->insert([
            'name' => 'Toko4',
            'user_id' => '4',
            'desc' => 'Toko ini menjual semua makanan dan minuman',
            'OpeningDay' => 'Monday',
            'ClosingDay' => 'Friday',
            'OpeningHours' => '09:00',
            'ClosingHours' => '15:00',
        ]);
        DB::table('shops')->insert([
            'name' => 'Toko5',
            'user_id' => '5',
            'desc' => 'Toko ini menjual semua pakaian pria',
            'OpeningDay' => 'Monday',
            'ClosingDay' => 'Sunday',
            'OpeningHours' => '09:00',
            'ClosingHours' => '17:00',
        ]);
    }
}

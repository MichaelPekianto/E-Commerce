<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Michael',
            'email' => 'michael@gmail.com',
            'password' => bcrypt('michael'),
            'user_role'=> 'admin',
            'gender' => 'Male'
        ]);
        DB::table('users')->insert([
            'name' => 'chenmaisterr',
            'email' => 'chenmalichen@gmail.com',
            'password' => bcrypt('jecojeco'),
            'user_role' => 'admin',
            'gender' => 'Male'
        ]);
        DB::table('users')->insert([
            'name' => 'Jeconiah Sugiyanto',
            'email' => 'jecochen12@gmail.com',
            'password' => bcrypt('jecojeco'),
            'user_role' => 'member',
            'gender' => 'Male'
        ]);

        DB::table('users')->insert([
            'name' => 'Nico Aripin',
            'email' => 'hajimefly@gmail.com',
            'password' => bcrypt('jecojeco'),
            'user_role' => 'member',
            'gender' => 'Male'
        ]);

        DB::table('users')->insert([
            'name' => 'Wendy Susanto',
            'email' => 'wentol@gmail.com',
            'password' => bcrypt('jecojeco'),
            'user_role' => 'member',
            'gender' => 'Male'
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBaseColor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colors')->insert([
            'name' => 'Black', 
            'encode' => '#222222'
        ]);
        DB::table('colors')->insert([
            'name' => 'DarkSlateGray', 
            'encode' => '#2F4F4F'
            ]);
        DB::table('colors')->insert([
            'name' => 'Blue', 
            'encode' => '#0000FF'
        ]);
        DB::table('colors')->insert([
            'name' => 'LightSkyBlue', 
            'encode' => '#87CEFA'
        ]);
        DB::table('colors')->insert([
            'name' => 'Turquoise', 
            'encode' => '#00F5FF'
        ]);
        DB::table('colors')->insert([
            'name' => 'SeaGreen', 
            'encode' => '#54FF9F'
        ]);
        DB::table('colors')->insert([
            'name' => 'LightGoldenrod', 
            'encode' => '#FFEC8B'
        ]);
        DB::table('colors')->insert([
            'name' => 'Firebrick', 
            'encode' => '#FF3030'
        ]);
        DB::table('colors')->insert([
            'name' => 'DeepPink', 
            'encode' => '#FF1493'
        ]);
    }
}

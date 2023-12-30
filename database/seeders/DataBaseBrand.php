<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBaseBrand extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
            'name' => 'SamSung'
        ]);
        DB::table('brands')->insert([
            'name' => 'Vivo'
        ]);
        DB::table('brands')->insert([
            'name' => 'Nokia'
        ]);
        DB::table('brands')->insert([
            'name' => 'Apple'
        ]);
        DB::table('brands')->insert([
            'name' => 'Xiaomi'
        ]);
    }
}

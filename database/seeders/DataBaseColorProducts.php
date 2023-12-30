<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DataBaseColorProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('color_product')->insert([
            'color_id' => 1, 
            'product_id' => 1,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 2, 
            'product_id' => 1,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 2, 
            'product_id' => 2,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 4, 
            'product_id' => 2,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 3, 
            'product_id' => 3,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 1, 
            'product_id' => 4,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 8, 
            'product_id' => 4,
        ]);
        DB::table('color_product')->insert([
            'color_id' => 5, 
            'product_id' => 4,
        ]);
    }
}

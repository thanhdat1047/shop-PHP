<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBaseBill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bills')->insert([
            'user_id' => 1, 
            'product_id' => 2,
            'quantity' => 2, 
            'total' => 799.8,
            'state' => true,
        ]);
        DB::table('bills')->insert([
            'user_id' => 1, 
            'product_id' => 4,
            'quantity' => 1, 
            'total' => 1500,
            'state' => true,
        ]);
    }
}

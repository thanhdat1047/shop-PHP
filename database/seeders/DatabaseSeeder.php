<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('products')->insert([
            'name' =>'Iphone SE', 
            'values'=> 425, 
            'image' => 'image1692247102-Iphone SE-product-1-720x480.jpg', 
            'operating_system' => 'IOS',
            'description' =>"At the heart of iPhone SE you'll find the same superpowerful A15 Bionic chip that's in iPhone 13.A15 Bionic enhances nearly everything you do. Apps load in a flash and feel so fluid.",
            'brand_id' => 4
        ]);

        DB::table('products')->insert([
            'name' =>'SamSung S20', 
            'values'=> 399.9, 
            'image' => 'image1692244367-Samsung S20-product-4-720x480.jpg', 
            'operating_system' => 'Android',
            'description' =>"At the heart of iPhone SE you'll find the same superpowerful A15 Bionic chip that's in iPhone 13.A15 Bionic enhances nearly everything you do. Apps load in a flash and feel so fluid.",
            'brand_id' => 1
        ]);
        DB::table('products')->insert([
            'name' =>'Redmin 9A', 
            'values'=> 99.9, 
            'operating_system' => 'Android',
            'image' => 'image1692244484-Xiaomi Redmi 9A-product-2-720x480.jpg', 
            'description' =>"Redmi 9A, price 99.9$",
            'brand_id' => 5
        ]);
        DB::table('products')->insert([
            'name' =>'Iphone 13', 
            'values'=> 1500, 
            'operating_system' => 'IOS',
            'image' => 'image1692244007-Iphone 13-product-3-720x480.jpg', 
            'description' =>"Iphone 13 , price 1500$ ",
            'brand_id' => 4
        ]);
    }
}

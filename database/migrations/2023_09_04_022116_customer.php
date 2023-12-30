<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}

// note 
// -tao bang customer 
// -tao guard => 'cus', trong config/auth
// -tao provider => customer , trong config/auth
// -tao middleware => customer 
// - vao http/Kernel.php 
//    gan  'cus' =>  \App\Http\Middleware\CustomerMiddleware::class,

//Cac trang can ap dung 
// profile => ho so ca nhan 
// Dat hang 
// Thay doi mat khau 
// dang nhap roi moi binh luan 


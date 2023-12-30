<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContructDatabase extends Migration
{
  
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('user', function (Blueprint $table) {
        //     $table->string('email',255)->primary();
        //     $table->string('password');
        //     $table->integer('sdt');
        //     $table->string('address');
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
            
        // });
        Schema::create('brands',function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');
            $table->timestamps();

        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('values');
            $table->string('image');
            $table->string('operating_system');
            $table->string('description');

            $table->timestamps();
            $table->date('deleted_at');
            //foreign keys
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id')
                    ->references('id')
                    ->on('brands')
                    ->onDelete('set null');

        });
        
        Schema::create('colors',function (Blueprint $table){
            $table->increments('id'); 
            $table->string('name');
            $table->string('encode');
            $table->timestamps();
          
        });
        Schema::create('color_product', function(Blueprint $table){
            $table->increments('id'); 
            $table->unsignedInteger('color_id'); 
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total');
            $table->integer('quantity');
            $table->boolean('state');
            $table->timestamps();

            //foreign keys
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')->onDelete('cascade');
            //foreign keys
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('set null');
        });

      
       


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('brands');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('products');
        Schema::dropIfExists('color_product');
        Schema::dropIfExists('bills');
    }


}

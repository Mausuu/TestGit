<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id, product_qty,  id_user, id_product  hả
        Schema::create('cartorder', function (Blueprint $table) {
            $table->id();
            $table->integer('product_qty');
            $table->timestamps();
            
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');    
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('product');  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartorder');
    }
};

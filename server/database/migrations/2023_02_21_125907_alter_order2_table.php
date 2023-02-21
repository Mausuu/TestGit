<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');    
            $table->unsignedBigInteger('id_cat');
            $table->foreign('id_cat')->references('id')->on('category');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

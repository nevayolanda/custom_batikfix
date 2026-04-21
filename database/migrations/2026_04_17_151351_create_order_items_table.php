<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // relasi ke orders (AMAN)
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // relasi ke batik (FIX DI SINI)
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                  ->references('id_batik') // ⬅️ sesuaikan dengan tabel batik kamu
                  ->on('batik')
                  ->onDelete('cascade');

            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};

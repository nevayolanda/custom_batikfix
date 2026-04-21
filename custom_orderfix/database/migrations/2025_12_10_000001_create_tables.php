<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Admin Table
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('nama_admin', 100);
            $table->timestamps();
        });

        // Batik Table
        Schema::create('batik', function (Blueprint $table) {
            $table->id('id_batik');
            $table->string('nama_batik', 100)->nullable();
            $table->string('gambar_batik', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // Pelanggan Table
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('nomor_telepon', 20)->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->timestamps();
        });

        // Custom Order Table
        Schema::create('custom_order', function (Blueprint $table) {
            $table->id('id_custom');
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->string('jenis_batik', 100)->nullable();
            $table->string('jenis_kain', 100)->nullable();
            $table->string('teknik', 100)->nullable();
            $table->text('teks_tambahan')->nullable();
            $table->enum('status', ['pending', 'proses', 'selesai', 'dibayar'])->default('pending');
            $table->timestamps();
        });

        // Pembayaran Table
        Schema::create('pembayaran_custom_batik', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_custom')->constrained('custom_order', 'id_custom')->onDelete('cascade');
            $table->foreignId('id_admin')->constrained('admin', 'id_admin');
            $table->date('tgl');
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->enum('metode_pembayaran', ['transfer', 'tunai', 'kartu_kredit'])->default('transfer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_custom_batik');
        Schema::dropIfExists('custom_order');
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('batik');
        Schema::dropIfExists('admin');
    }
};

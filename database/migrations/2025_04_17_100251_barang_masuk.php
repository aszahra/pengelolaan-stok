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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('kd_bm');
            $table->string('kd_supplier');
            $table->string('kd_barang');
            $table->dateTime('tanggal');
            $table->integer('jumlah');
            $table->integer('harga_satuan');
            $table->integer('total');
            $table->string('kd_user');
            $table->timestamps();
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

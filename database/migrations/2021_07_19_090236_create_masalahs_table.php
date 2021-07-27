<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasalahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masalahs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('latar_belakang')->nullable();
            $table->string('deskripsi_masalah')->nullable();
            $table->string('kategori')->nullable();
            $table->string('tanggal_buat')->nullable();
            $table->string('tanggal_ubah')->nullable();
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
        Schema::dropIfExists('masalahs');
    }
}

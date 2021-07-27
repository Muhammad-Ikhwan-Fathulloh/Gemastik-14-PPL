<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solusis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_permasalahan');
            $table->string('deskripsi_solusi')->nullable();
            $table->string('deskripsi_penerapan')->nullable();
            $table->string('harapan')->nullable();
            $table->string('file_solusi')->nullable();
            $table->string('file_penerapan')->nullable();
            $table->string('feedback')->nullable();
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
        Schema::dropIfExists('solusis');
    }
}

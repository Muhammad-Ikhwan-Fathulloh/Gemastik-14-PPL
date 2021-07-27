<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspirasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspirasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_users');
            $table->string('inspirasi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('tanggal_buat_inspirasi')->nullable();
            $table->string('tanggal_ubah_inspirasi')->nullable();
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
        Schema::dropIfExists('inspirasis');
    }
}

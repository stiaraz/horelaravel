<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recognition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Recognition', function (Blueprint $table){
            $table->increments('id');
            $table->string('tempat');
            $table->dateTime('waktu');
            $table->string('nama');
            $table->string('foto');
            $table->integer('status');
        });

        Schema::create('listanggota', function (Blueprint $table){
            $table->increments('no');
            $table->bigInteger('id')->unique();
            $table->string('nama');
        });

        Schema::create('absen', function (Blueprint $table){
            $table->increments('no');
            $table->bigInteger('id');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Recognition');
        Schema::dropIfExists('listanggota');
         Schema::dropIfExists('absen');
    }
}

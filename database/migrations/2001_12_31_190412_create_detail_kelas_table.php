<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kelas')->references('id')->on('kelas');
            $table->integer('id_siswa')->references('id')->on('detail_siswa');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_kelas');
    }
}

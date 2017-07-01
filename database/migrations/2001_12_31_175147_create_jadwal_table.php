<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('semester');
            $table->enum('hari', [
                'Senin', 'Selasa', 'Rabu', 'Kamis',
                "Jumat", 'Sabtu', 'Minggu'
            ]);
            $table->string('jam_mulai');
            $table->string('jam_akhir');
            $table->integer('id_guru')->references('id')->on('guru');
            $table->integer('id_matpel')->references('id')->on('matpel');
            $table->integer('id_tahun')->references('id')->on('tahun_ajar');
            $table->integer('id_kelas')->references('id')->on('kelas');
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
        Schema::drop('jadwal');
    }
}

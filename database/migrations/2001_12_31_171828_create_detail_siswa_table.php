<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_siswa', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NIS');
            $table->integer('reg_id')->refrences('id')->on('pendaftaran');
            $table->integer('id_tahun')->refrences('id')->on('tahun_ajar');
            $table->string('nama');
            $table->date('tgl_pend');
            $table->date('tgl_lahir');
            $table->string('tmp_lahir');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->string('kode_pos');
            $table->enum('sex', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('gol_darah');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nama_wali');
            $table->string('pek_ayah');
            $table->string('pek_ibu');
            $table->string('no_hp_wali');
            $table->enum('status', ['Aktif', 'Keluar', 'Pindah', 'Dikeluarkan']);
            $table->text('ket');
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
        Schema::drop('detail_siswa');
    }
}

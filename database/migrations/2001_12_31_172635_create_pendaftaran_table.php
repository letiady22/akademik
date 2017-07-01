<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function(Blueprint $table) {
            $table->increments('id');
            $table->string('no_reg')->unique();
            $table->integer('id_tahun')->references('id')->on('tahun_ajar');
            $table->string('nama');
            $table->string('asal_sekolah');
            $table->text('alamat_sekolah');
            $table->string('tahun_lulus');
            $table->string('no_ijazah')->unique();
            $table->float('nem');
            $table->float('nilai_un');
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
        Schema::drop('pendaftaran');
    }
}

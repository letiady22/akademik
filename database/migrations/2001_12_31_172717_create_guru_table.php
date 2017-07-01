<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NIP')->unique();
            $table->integer('id_matpel')->refrences('id')->on('matpel');
            $table->string('nama');
            $table->text('alamat');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('email');
            $table->enum('sex', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('jabatan');
            $table->string('golongan');
            $table->string('status_guru');
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
        Schema::drop('guru');
    }
}

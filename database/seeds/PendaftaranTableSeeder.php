<?php

use Illuminate\Database\Seeder;

use Letiady\Pendaftaran;

class PendaftaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Letiady\Pendaftaran::class, 40)->create()->each(function ($p) {
            $p->detailSiswa()->save(factory(\Letiady\DetailSiswa::class)->make([
                'nama' => $p->nama
            ]));
        });
    }
}

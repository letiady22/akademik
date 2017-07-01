<?php

use Illuminate\Database\Seeder;

class TahunAjarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Letiady\TahunAjar::insert([
            ['nama_tahun' => 2017],
            ['nama_tahun' => 2016],
            ['nama_tahun' => 2015],
        ]);
    }
}

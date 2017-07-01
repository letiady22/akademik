<?php

use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Letiady\Jurusan::insert([
            ['nama' => 'IPA'],
            ['nama' => 'IPS'],
            ['nama' => 'Tata Boga'],
            ['nama' => 'RPL'],
            ['nama' => 'Teknik Elektro'],
            ['nama' => 'Teknik Mesin'],
            ['nama' => 'Teknik Otomotif']
        ]);
    }
}

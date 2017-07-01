<?php

use Illuminate\Database\Seeder;
use Letiady\Matpel;

class MatpelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matpel::create(['nama' => 'Fisika']);
        Matpel::create(['nama' => 'Matematika']);
        Matpel::create(['nama' => 'Bahasa Inggris']);
        Matpel::create(['nama' => 'HTML']);
        Matpel::create(['nama' => 'Java']);
        Matpel::create(['nama' => 'PHP']);
        Matpel::create(['nama' => 'Biologi']);
        Matpel::create(['nama' => 'Sejarah']);
        Matpel::create(['nama' => 'Bahasa Indonesia']);
        Matpel::create(['nama' => 'Bahasa Sunda']);
        Matpel::create(['nama' => 'Pendidikan Agama Islam']);
        Matpel::create(['nama' => 'Pendidikan Kewarganegaraan']);
        Matpel::create(['nama' => 'Ekonomi']);
        Matpel::create(['nama' => 'Pendidikan Jasmani dan Kesehatan']);
        Matpel::create(['nama' => 'Kesenian']);
    }
}

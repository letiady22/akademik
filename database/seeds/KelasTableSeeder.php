<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Letiady\Kelas::insert([
            ['nama' => 'X IPA I'],
            ['nama' => 'X IPA II'],
            ['nama' => 'X IPA III'],
            ['nama' => 'X IPS I'],
            ['nama' => 'X IPS II'],
            ['nama' => 'X RPL I'],
            ['nama' => 'XI IPA I'],
            ['nama' => 'XI IPA II'],
            ['nama' => 'XI IPA III'],
            ['nama' => 'XI IPS I'],
            ['nama' => 'XI IPS II'],
            ['nama' => 'XI RPL I'],
            ['nama' => 'XII IPA I'],
            ['nama' => 'XII IPA II'],
            ['nama' => 'XII IPA III'],
            ['nama' => 'XII IPS I'],
            ['nama' => 'XII IPS II'],
            ['nama' => 'XII RPL I'],
        ]);
    }
}

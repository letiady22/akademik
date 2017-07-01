<?php

use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Letiady\Guru::class, 20)->create();
    }
}

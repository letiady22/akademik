<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PendaftaranTableSeeder::class);
        $this->call(GuruTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(TahunAjarTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(MatpelTableSeeder::class);
    }
}

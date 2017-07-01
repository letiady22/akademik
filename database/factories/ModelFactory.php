<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Letiady\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Letiady\Pendaftaran::class, function(Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\id_ID\Person($faker));
    return [
        'no_reg' => $faker->unique()->randomNumber,
        'nama' => $faker->name,
        'asal_sekolah' => 'SMP N 7 Tasikmalaya',
        'alamat_sekolah' => 'Tasikmalaya',
        'tahun_lulus' => 2017,
        'no_ijazah' => $faker->unique()->randomNumber,
        'nem' => $faker->randomFloat(3, 4),
        'nilai_un' => $faker->randomFloat(7, 10)
    ];
});

$factory->define(Letiady\DetailSiswa::class, function(Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\id_ID\Person($faker));
    $faker->addProvider(new Faker\Provider\id_ID\Address($faker));
    $faker->addProvider(new Faker\Provider\id_ID\PhoneNumber($faker));
    return [
        'NIS' => $faker->unique()->randomNumber,
        'tgl_pend' => Carbon\Carbon::now()->format('Y-m-d'),
        'tgl_lahir' => Carbon\Carbon::today()->year($faker->randomElement([
                1998, 1999, 1997 ]))->day($faker->randomDigit)->month($faker->randomDigit),
        'tmp_lahir' => $faker->city,
        'alamat' => $faker->address,
        'no_hp' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'sex' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        'kode_pos' => $faker->postcode,
        'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O', 'C']),
        'nama_ibu' => $faker->name,
        'nama_ayah' => $faker->name,
        'pek_ibu' => $faker->jobTitle,
        'pek_ayah' => $faker->jobTitle,
        'nama_wali' => $faker->name,
        'no_hp_wali' => $faker->phoneNumber,
        'agama' => 'Islam'
    ];
});

$factory->define(Letiady\Guru::class, function(Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\id_ID\Person($faker));
    $faker->addProvider(new Faker\Provider\id_ID\Address($faker));
    $faker->addProvider(new Faker\Provider\id_ID\PhoneNumber($faker));
    return [
        'NIP' => $faker->unique()->randomNumber,
        'nama' => $faker->name,
        'tgl_lahir' => Carbon\Carbon::today()->year($faker->randomElement([
                1988, 1979, 1987, 1985 ]))->day($faker->randomDigit)->month($faker->randomDigit),
        'alamat' => $faker->address,
        'telepon' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'sex' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        'kode_pos' => $faker->postcode,
        'tmp_lahir' => $faker->city,
        'agama' => 'Islam',
        'status_guru' => $faker->randomElement(['Honorer', 'PNS'])
    ];
});

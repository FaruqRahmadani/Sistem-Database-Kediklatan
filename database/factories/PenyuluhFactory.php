<?php

use Faker\Generator as Faker;

$factory->define(Penyuluh::class, function (Faker $faker) {
  $satuanKerja = $faker->randomElement(SatuanKerja::all()->pluck('id')->toArray());
  $unitKerja = $faker->randomElement(UnitKerja::all()->pluck('id')->toArray());
  return [
    'nip' => $faker->numerify('######## ###### # ###'),
    'nama' => $faker->name,
    'tempat_lahir' => $faker->city,
    'tanggal_lahir' => $faker->dateTime("-18 years"),
    'agama' => $faker->word,
    'jenis_kelamin' => $faker->word,
    'status_kawin' => $faker->word,
    'pangkat_golongan' => $faker->word,
    'jabatan' => $faker->word,
    'pendidikan_terakhir' => $faker->word,
    'nomor_hp' => $faker->phoneNumber,
    'satuan_kerja_id' => $satuanKerja,
    'unit_kerja_id' => $unitKerja,
  ];
});

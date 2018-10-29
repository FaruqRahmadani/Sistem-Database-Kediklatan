<?php

use Faker\Generator as Faker;

$factory->define(KelompokTani::class, function (Faker $faker) {
  $kotaId = $faker->randomElement(Kota::all()->pluck('id')->toArray());
  $penyuluhId = $faker->randomElement(Penyuluh::all()->pluck('id')->toArray());
  return [
    'nama' => $faker->name,
    'nama_ketua' => $faker->name,
    'nomor_hp' => $faker->phoneNumber,
    'alamat' => $faker->address,
    'kota_id' => $kotaId,
    'penyuluh_id' => $penyuluhId,
  ];
});

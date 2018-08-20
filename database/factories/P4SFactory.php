<?php

use Faker\Generator as Faker;

$factory->define(P4S::class, function (Faker $faker) {
  $KotaId = $faker->randomElement(Kota::all()->pluck('id')->toArray());
  return [
    'nama' => $faker->name,
    'nama_ketua' => $faker->name,
    'nomor_hp' => $faker->phoneNumber,
    'alamat' => $faker->address,
    'kota_id' => $KotaId,
  ];
});

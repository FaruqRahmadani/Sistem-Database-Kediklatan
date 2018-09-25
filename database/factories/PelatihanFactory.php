<?php

use Faker\Generator as Faker;

$factory->define(Pelatihan::class, function (Faker $faker) {
  return [
    'nama' => $faker->safeColorName,
    'tanggal' => $faker->dateTimeBetween('now', '+1 years'),
    'keterangan' => $faker->text,
    'tipe' => $faker->numberBetween(1,3),
  ];
});

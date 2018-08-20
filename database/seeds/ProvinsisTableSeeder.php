<?php

use Illuminate\Database\Seeder;

class ProvinsisTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $Provinsi = [
      array('id' => '11','nama' => 'Aceh'),
      array('id' => '12','nama' => 'Sumatera Utara'),
      array('id' => '13','nama' => 'Sumatera Barat'),
      array('id' => '14','nama' => 'Riau'),
      array('id' => '15','nama' => 'Jambi'),
      array('id' => '16','nama' => 'Sumatera Selatan'),
      array('id' => '17','nama' => 'Bengkulu'),
      array('id' => '18','nama' => 'Lampung'),
      array('id' => '19','nama' => 'Kepulauan Bangka Belitung'),
      array('id' => '21','nama' => 'Kepulauan Riau'),
      array('id' => '31','nama' => 'DKI Jakarta'),
      array('id' => '32','nama' => 'Jawa Barat'),
      array('id' => '33','nama' => 'Jawa Tengah'),
      array('id' => '34','nama' => 'DI Yogyakarta'),
      array('id' => '35','nama' => 'Jawa Timur'),
      array('id' => '36','nama' => 'Banten'),
      array('id' => '51','nama' => 'Bali'),
      array('id' => '52','nama' => 'Nusa Tenggara Barat'),
      array('id' => '53','nama' => 'Nusa Tenggara Timur'),
      array('id' => '61','nama' => 'Kalimantan Barat'),
      array('id' => '62','nama' => 'Kalimantan Tengah'),
      array('id' => '63','nama' => 'Kalimantan Selatan'),
      array('id' => '64','nama' => 'Kalimantan Timur'),
      array('id' => '65','nama' => 'Kalimantan Utara'),
      array('id' => '71','nama' => 'Sulawesi Utara'),
      array('id' => '72','nama' => 'Sulawesi Tengah'),
      array('id' => '73','nama' => 'Sulawesi Selatan'),
      array('id' => '74','nama' => 'Sulawesi Tenggara'),
      array('id' => '75','nama' => 'Gorontalo'),
      array('id' => '76','nama' => 'Sulawesi Barat'),
      array('id' => '81','nama' => 'Maluku'),
      array('id' => '82','nama' => 'Maluku Utara'),
      array('id' => '91','nama' => 'Papua Barat'),
      array('id' => '94','nama' => 'Papua')
    ];
    if (!DB::table('provinsis')->count()) {
      DB::table('provinsis')->insert($Provinsi);
    }
  }
}

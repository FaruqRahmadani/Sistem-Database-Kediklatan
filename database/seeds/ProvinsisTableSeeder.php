<?php

use Illuminate\Database\Seeder;

use App\Seed;

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
      array('id' => '11','nama_provinsi' => 'ACEH'),
      array('id' => '12','nama_provinsi' => 'SUMATERA UTARA'),
      array('id' => '13','nama_provinsi' => 'SUMATERA BARAT'),
      array('id' => '14','nama_provinsi' => 'RIAU'),
      array('id' => '15','nama_provinsi' => 'JAMBI'),
      array('id' => '16','nama_provinsi' => 'SUMATERA SELATAN'),
      array('id' => '17','nama_provinsi' => 'BENGKULU'),
      array('id' => '18','nama_provinsi' => 'LAMPUNG'),
      array('id' => '19','nama_provinsi' => 'KEPULAUAN BANGKA BELITUNG'),
      array('id' => '21','nama_provinsi' => 'KEPULAUAN RIAU'),
      array('id' => '31','nama_provinsi' => 'DKI JAKARTA'),
      array('id' => '32','nama_provinsi' => 'JAWA BARAT'),
      array('id' => '33','nama_provinsi' => 'JAWA TENGAH'),
      array('id' => '34','nama_provinsi' => 'DI YOGYAKARTA'),
      array('id' => '35','nama_provinsi' => 'JAWA TIMUR'),
      array('id' => '36','nama_provinsi' => 'BANTEN'),
      array('id' => '51','nama_provinsi' => 'BALI'),
      array('id' => '52','nama_provinsi' => 'NUSA TENGGARA BARAT'),
      array('id' => '53','nama_provinsi' => 'NUSA TENGGARA TIMUR'),
      array('id' => '61','nama_provinsi' => 'KALIMANTAN BARAT'),
      array('id' => '62','nama_provinsi' => 'KALIMANTAN TENGAH'),
      array('id' => '63','nama_provinsi' => 'KALIMANTAN SELATAN'),
      array('id' => '64','nama_provinsi' => 'KALIMANTAN TIMUR'),
      array('id' => '65','nama_provinsi' => 'KALIMANTAN UTARA'),
      array('id' => '71','nama_provinsi' => 'SULAWESI UTARA'),
      array('id' => '72','nama_provinsi' => 'SULAWESI TENGAH'),
      array('id' => '73','nama_provinsi' => 'SULAWESI SELATAN'),
      array('id' => '74','nama_provinsi' => 'SULAWESI TENGGARA'),
      array('id' => '75','nama_provinsi' => 'GORONTALO'),
      array('id' => '76','nama_provinsi' => 'SULAWESI BARAT'),
      array('id' => '81','nama_provinsi' => 'MALUKU'),
      array('id' => '82','nama_provinsi' => 'MALUKU UTARA'),
      array('id' => '91','nama_provinsi' => 'PAPUA BARAT'),
      array('id' => '94','nama_provinsi' => 'PAPUA')
    ];

    DB::table('provinsis')->insert($Provinsi);
  }
}

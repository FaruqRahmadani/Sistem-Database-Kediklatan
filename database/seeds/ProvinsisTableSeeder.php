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
      array('id' => '11','nama_provinsi' => ucwords(strtolower('ACEH'))),
      array('id' => '12','nama_provinsi' => ucwords(strtolower('SUMATERA UTARA'))),
      array('id' => '13','nama_provinsi' => ucwords(strtolower('SUMATERA BARAT'))),
      array('id' => '14','nama_provinsi' => ucwords(strtolower('RIAU'))),
      array('id' => '15','nama_provinsi' => ucwords(strtolower('JAMBI'))),
      array('id' => '16','nama_provinsi' => ucwords(strtolower('SUMATERA SELATAN'))),
      array('id' => '17','nama_provinsi' => ucwords(strtolower('BENGKULU'))),
      array('id' => '18','nama_provinsi' => ucwords(strtolower('LAMPUNG'))),
      array('id' => '19','nama_provinsi' => ucwords(strtolower('KEPULAUAN BANGKA BELITUNG'))),
      array('id' => '21','nama_provinsi' => ucwords(strtolower('KEPULAUAN RIAU'))),
      array('id' => '31','nama_provinsi' => ucwords(strtolower('DKI JAKARTA'))),
      array('id' => '32','nama_provinsi' => ucwords(strtolower('JAWA BARAT'))),
      array('id' => '33','nama_provinsi' => ucwords(strtolower('JAWA TENGAH'))),
      array('id' => '34','nama_provinsi' => ucwords(strtolower('DI YOGYAKARTA'))),
      array('id' => '35','nama_provinsi' => ucwords(strtolower('JAWA TIMUR'))),
      array('id' => '36','nama_provinsi' => ucwords(strtolower('BANTEN'))),
      array('id' => '51','nama_provinsi' => ucwords(strtolower('BALI'))),
      array('id' => '52','nama_provinsi' => ucwords(strtolower('NUSA TENGGARA BARAT'))),
      array('id' => '53','nama_provinsi' => ucwords(strtolower('NUSA TENGGARA TIMUR'))),
      array('id' => '61','nama_provinsi' => ucwords(strtolower('KALIMANTAN BARAT'))),
      array('id' => '62','nama_provinsi' => ucwords(strtolower('KALIMANTAN TENGAH'))),
      array('id' => '63','nama_provinsi' => ucwords(strtolower('KALIMANTAN SELATAN'))),
      array('id' => '64','nama_provinsi' => ucwords(strtolower('KALIMANTAN TIMUR'))),
      array('id' => '65','nama_provinsi' => ucwords(strtolower('KALIMANTAN UTARA'))),
      array('id' => '71','nama_provinsi' => ucwords(strtolower('SULAWESI UTARA'))),
      array('id' => '72','nama_provinsi' => ucwords(strtolower('SULAWESI TENGAH'))),
      array('id' => '73','nama_provinsi' => ucwords(strtolower('SULAWESI SELATAN'))),
      array('id' => '74','nama_provinsi' => ucwords(strtolower('SULAWESI TENGGARA'))),
      array('id' => '75','nama_provinsi' => ucwords(strtolower('GORONTALO'))),
      array('id' => '76','nama_provinsi' => ucwords(strtolower('SULAWESI BARAT'))),
      array('id' => '81','nama_provinsi' => ucwords(strtolower('MALUKU'))),
      array('id' => '82','nama_provinsi' => ucwords(strtolower('MALUKU UTARA'))),
      array('id' => '91','nama_provinsi' => ucwords(strtolower('PAPUA BARAT'))),
      array('id' => '94','nama_provinsi' => ucwords(strtolower('PAPUA'))),
    ];

    DB::table('provinsis')->insert($Provinsi);
  }
}

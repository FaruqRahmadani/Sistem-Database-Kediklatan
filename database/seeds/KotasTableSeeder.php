<?php

use Illuminate\Database\Seeder;

class KotasTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $Kota = [
      array('id' => '6301','provinsi_id' => '63','nama' => 'Kabupaten Tanah Laut'),
      array('id' => '6302','provinsi_id' => '63','nama' => 'Kabupaten Kota Baru'),
      array('id' => '6303','provinsi_id' => '63','nama' => 'Kabupaten Banjar'),
      array('id' => '6304','provinsi_id' => '63','nama' => 'Kabupaten Barito Kuala'),
      array('id' => '6305','provinsi_id' => '63','nama' => 'Kabupaten Tapin'),
      array('id' => '6306','provinsi_id' => '63','nama' => 'Kabupaten Hulu Sungai Selatan'),
      array('id' => '6307','provinsi_id' => '63','nama' => 'Kabupaten Hulu Sungai Tengah'),
      array('id' => '6308','provinsi_id' => '63','nama' => 'Kabupaten Hulu Sungai Utara'),
      array('id' => '6309','provinsi_id' => '63','nama' => 'Kabupaten Tabalong'),
      array('id' => '6310','provinsi_id' => '63','nama' => 'Kabupaten Tanah Bumbu'),
      array('id' => '6311','provinsi_id' => '63','nama' => 'Kabupaten Balangan'),
      array('id' => '6371','provinsi_id' => '63','nama' => 'Kota Banjarmasin'),
      array('id' => '6372','provinsi_id' => '63','nama' => 'Kota Banjar Baru'),
    ];

    if (!DB::table('kotas')->count()) {
      DB::table('kotas')->insert($Kota);
    }
  }
}

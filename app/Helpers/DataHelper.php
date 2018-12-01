<?php
namespace App\Helpers;

class DataHelper
{
  public static function agama(){
    $data = [ 'Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha'];
    return $data;
  }

  public static function jenisKelamin(){
    $data = ['Laki-Laki', 'Perempuan'];
    return $data;
  }

  public static function statusKawin(){
    $data = ['Belum Kawin', 'Sudah Kawin'];
    return $data;
  }

  public static function pendidikanTerakhir(){
    $data = ['SMP','SMA', 'SMK PERTANIAN', 'SPP', 'DI', 'DII', 'DIII', 'DIV', 'S1', 'S2' ];
    return $data;
  }
}

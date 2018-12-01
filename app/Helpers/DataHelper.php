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
    $data = ['SD', 'SMP', 'SMA', 'DI/DII', 'S1'];
    return $data;
  }
}

<?php
namespace App\Helpers;

use Carbon\Carbon;
use HDate;

class DateHelper
{
  private static function MonthFormat($value){
    $Month = [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    ];

    return $Month[$value-1];
  }

  public static function Now(){
    $return = Carbon::now()->format('Y-m-d');
    return $return;
  }

  public static function DateFormat($value){
    $Tanggal = Carbon::parse($value)->format("d");
    $Bulan = HDate::MonthFormat(Carbon::parse($value)->format("n"));
    $Tahun = Carbon::parse($value)->format("Y");
    return "{$Tanggal} {$Bulan} {$Tahun}";
  }
}

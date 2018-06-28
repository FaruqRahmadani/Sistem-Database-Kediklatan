<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SatuanKerja;
use App\UnitKerja;
use App\Provinsi;
use App\Kota;

class JsonController extends Controller
{
  public function DataProvinsi(){
    $Provinsi = Provinsi::all();
    return $Provinsi;
  }

  public function DataKota($ProvinsiId = null){
    if ($ProvinsiId) {
      $Kota = Kota::where('provinsi_id', $ProvinsiId)
                  ->get();
    } else {
      $Kota = Kota::all();
    }
    return $Kota;
  }

  public function DataSatuanKerja(){
    $SatKerja = SatuanKerja::select('id', 'nama')
                           ->get();
    return $SatKerja;
  }

  public function DataUnitKerja(){
    $UnitKerja = UnitKerja::select('id', 'nama')
                          ->get();
    return $UnitKerja;
  }
}

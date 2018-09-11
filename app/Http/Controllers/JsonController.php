<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SatuanKerja;
use App\UnitKerja;
use App\Komoditas;
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

  public function DataKomoditas($Id = null){
    if ($Id) {
      $Komoditas = Komoditas::select('id', 'nama', 'keterangan')
                            ->findOrFail($Id);
    } else {
      $Komoditas = Komoditas::select('id', 'nama', 'keterangan')
                            ->get();
    }
    return $Komoditas;
  }
  public function TambahSatuanKerja(Request $request){
    $SatuanKerja = new SatuanKerja;
    $SatuanKerja->fill($request->all());
    $SatuanKerja->save();

    return $SatuanKerja->id;
  }

  public function TambahUnitKerja(Request $request){
    $UnitKerja = new UnitKerja;
    $UnitKerja->fill($request->all());
    $UnitKerja->save();

    return $UnitKerja->id;
  }

  public function DataDaerahKomoditas($Id){
    return Kota::findOrFail($Id)->Komoditas;
  }
}

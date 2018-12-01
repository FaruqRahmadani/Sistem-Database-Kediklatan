<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\KelompokTani;
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
    $Kota = $ProvinsiId? Kota::where('provinsi_id', $ProvinsiId)->get() : Kota::all();
    return $Kota;
  }

  public function DataSatuanKerja(){
    $SatKerja = SatuanKerja::select('id', 'nama')->get();
    return $SatKerja;
  }

  public function DataUnitKerja(){
    $UnitKerja = UnitKerja::select('id', 'nama')->get();
    return $UnitKerja;
  }

  public function DataKomoditas($Id = null){
    $rawKomoditas = Komoditas::select('id', 'nama', 'keterangan');
    $Komoditas = $Id? $rawKomoditas->findOrFail($Id) : $rawKomoditas->get();
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
    $Data['Selected'] = Kota::findOrFail($Id)->Komoditas;
    $Data['notSelected'] = Komoditas::whereNotIn('id', $Data['Selected']->pluck('id'))->get();
    return $Data;
  }
  public function KelTaniKomoditas($Id){
    return KelompokTani::findOrFail($Id)->Komoditas->pluck('id');
  }
}

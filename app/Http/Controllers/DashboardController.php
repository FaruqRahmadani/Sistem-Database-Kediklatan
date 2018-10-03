<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\SatuanKerja;
use App\UnitKerja;
use App\Komoditas;
use App\Penyuluh;

class DashboardController extends Controller
{
  public function Dashboard(){
    $Penyuluh = Penyuluh::all();
    $Komoditas = Komoditas::all();
    $KelompokTani = KelompokTani::all();
    return view('Dashboard.Dashboard', compact('Penyuluh', 'Komoditas', 'KelompokTani'));
  }

  public function FormPencarian(){
    $SatuanKerja = SatuanKerja::all();
    $UnitKerja = UnitKerja::all();
    $Komoditas = Komoditas::all();
    return view('Pencarian.Form', compact('SatuanKerja', 'UnitKerja', 'Komoditas'));
  }

  public function DataPenyuluhFilter(Request $request){
    $Penyuluh = new Penyuluh;
    if ($request->satuanKerja) {
      $Penyuluh = $Penyuluh->whereSatuanKerjaId($request->satuanKerja);
    }
    if ($request->unitKerja) {
      $Penyuluh = $Penyuluh->whereUnitKerjaId($request->unitKerja);
    }
    $Penyuluh = $Penyuluh->get();
    $SatuanKerja = SatuanKerja::all();
    $UnitKerja = UnitKerja::all();
    $Komoditas = Komoditas::all();
    $Selected = $request;
    return view('Pencarian.Form', compact('Penyuluh', 'SatuanKerja', 'UnitKerja', 'Komoditas', 'Selected'));
  }

  public function DataKelTaniFilter(Request $request){
    $KelompokTani = new KelompokTani;
    if ($request->provinsi_id) {
      $KelompokTani = $KelompokTani->whereProvinsiId($request->provinsi_id);
    }
    if ($request->kota_id) {
      $KelompokTani = $KelompokTani->whereKotaId($request->kota_id);
    }
    if ($request->komoditas_id) {
      $KelompokTani = $KelompokTani->whereHas('Komoditas', function($query) use ($request){
        $query->whereKomoditasId($request->komoditas_id);
      });
    }
    $KelompokTani = $KelompokTani->get();
    $SatuanKerja = SatuanKerja::all();
    $UnitKerja = UnitKerja::all();
    $Komoditas = Komoditas::all();
    $Selected = $request;
    return view('Pencarian.Form', compact('KelompokTani', 'SatuanKerja', 'UnitKerja', 'Komoditas', 'Selected'));
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\SatuanKerja;
use App\UnitKerja;
use App\Komoditas;
use App\Pelatihan;
use App\Penyuluh;
use App\P4S;
use Auth;

class DashboardController extends Controller
{
  public function Dashboard(){
    if (Auth::User()->tipe == 5) return $this->dashboardAdmin();
    if (Auth::User()->tipe == 1) return $this->dashboardPenyuluh();
    if (Auth::User()->tipe == 2) return $this->dashboardKelompokTani();
    if (Auth::User()->tipe == 3) return $this->dashboardP4S();
  }

  public function dashboardAdmin(){
    $Penyuluh = Penyuluh::all();
    $Komoditas = Komoditas::all();
    $KelompokTani = KelompokTani::all();
    $Pelatihan = Pelatihan::all();
    return view('Dashboard.Dashboard', compact('Penyuluh', 'Komoditas', 'KelompokTani', 'Pelatihan'));
  }

  public function dashboardPenyuluh(){
    $Penyuluh = Penyuluh::findOrFail(Auth::User()->Data->id);
    return view('Dashboard.Penyuluh', compact('Penyuluh'));
  }

  public function dashboardKelompokTani(){
    $KelompokTani = KelompokTani::findOrFail(Auth::User()->Data->id);
    return view('Dashboard.KelompokTani', compact('KelompokTani'));
  }

  public function dashboardP4S(){
    $p4s = P4S::findOrFail(Auth::User()->Data->id);
    return view('Dashboard.P4S', compact('p4s'));
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

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
}

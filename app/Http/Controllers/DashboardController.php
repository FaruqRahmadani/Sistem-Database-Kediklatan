<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyuluh;
use App\Komoditas;
use App\KelompokTani;

class DashboardController extends Controller
{
  public function Dashboard(){
    $Penyuluh = Penyuluh::all();
    $Komoditas = Komoditas::all();
    $KelompokTani = KelompokTani::all();
    return view('Dashboard.Dashboard', compact('Penyuluh', 'Komoditas', 'KelompokTani'));
  }
}

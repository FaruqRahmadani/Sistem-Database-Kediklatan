<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SatuanKerja;
use App\UnitKerja;
use App\Penyuluh;

use PDF;

class CetakController extends Controller
{
  public function SatuanKerja(){
    $SatKerja = SatuanKerja::all();
    $pdf = PDF::loadview('Laporan.SatuanKerja', ['SatKerja' => $SatKerja]);
    return $pdf->setPaper('a4', 'landscape')->stream();
  }

  public function UnitKerja(){
    $UnitKerja = UnitKerja::all();
    $pdf = PDF::loadview('Laporan.UnitKerja', ['UnitKerja' => $UnitKerja]);
    return $pdf->setPaper('a4', 'potrait')->stream();
  }

  public function Penyuluh(){
    $Penyuluh = Penyuluh::all();
    $pdf = PDF::loadview('Laporan.Penyuluh', ['Penyuluh' => $Penyuluh]);
    return $pdf->setPaper('a3', 'landscape')->stream();
  }
}

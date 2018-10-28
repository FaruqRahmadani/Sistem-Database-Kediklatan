<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SatuanKerja;
use App\UnitKerja;
use App\Penyuluh;
use HCrypt;

use PDF;

class CetakController extends Controller
{
  public function SatuanKerja(){
    $SatKerja = SatuanKerja::all();
    $pdf = PDF::loadview('Cetak.SatuanKerja', ['SatKerja' => $SatKerja]);
    return $pdf->setPaper('a4', 'landscape')->stream();
  }

  public function UnitKerja(){
    $UnitKerja = UnitKerja::all();
    $pdf = PDF::loadview('Cetak.UnitKerja', ['UnitKerja' => $UnitKerja]);
    return $pdf->setPaper('a4', 'potrait')->stream();
  }

  public function Penyuluh(){
    $Penyuluh = Penyuluh::all();
    $pdf = PDF::loadview('Cetak.Penyuluh', ['Penyuluh' => $Penyuluh]);
    return $pdf->setPaper('a3', 'landscape')->stream();
  }

  public function penyuluhDetail($id){
    $id = HCrypt::Decrypt($id);
    $Penyuluh = Penyuluh::findOrFail($id);
    $pdf = PDF::loadview('Cetak.detailPenyuluh', ['Penyuluh' => $Penyuluh]);
    return $pdf->setPaper('a4', 'potrait')->stream();
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\KelompokTani;
use App\SatuanKerja;
use App\UnitKerja;
use App\Penyuluh;
use HCrypt;

use PDF;

class CetakController extends Controller
{
  public function SatuanKerja(){
    $SatKerja = SatuanKerja::all();
    $pdf = PDF::loadview('Cetak.SatuanKerja', compact('SatKerja'));
    return $pdf->setPaper('a4', 'landscape')->stream();
  }

  public function UnitKerja(){
    $UnitKerja = UnitKerja::all();
    $pdf = PDF::loadview('Cetak.UnitKerja', compact('UnitKerja'));
    return $pdf->setPaper('a4', 'potrait')->stream();
  }

  public function Penyuluh(){
    $Penyuluh = Penyuluh::all();
    $pdf = PDF::loadview('Cetak.Penyuluh', compact('Penyuluh'));
    return $pdf->setPaper('a3', 'landscape')->stream();
  }

  public function penyuluhDetail($id){
    $id = HCrypt::Decrypt($id);
    $Penyuluh = Penyuluh::findOrFail($id);
    $pdf = PDF::loadview('Cetak.detailPenyuluh', compact('Penyuluh'));
    return $pdf->setPaper('a4', 'potrait')->stream();
  }

  public function kelompokTani(){
    $kelompokTani = KelompokTani::all();
    $pdf = PDF::loadview('Cetak.kelompokTani', compact('kelompokTani'));
    return $pdf->setPaper('a4', 'landscape')->stream();
  }

  public function kelompokTaniDetail($id){
    $id = HCrypt::Decrypt($id);
    $KelompokTani = KelompokTani::findOrFail($id);
    $pdf = PDF::loadview('Cetak.detailKelompokTani', compact('KelompokTani'));
    return $pdf->setPaper('a4', 'potrait')->stream();
  }
}

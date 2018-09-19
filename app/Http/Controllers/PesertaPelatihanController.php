<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\Pelatihan;
use App\Penyuluh;
use App\P4S;
use HCrypt;

class PesertaPelatihanController extends Controller
{
  public function Data($idPelatihan){
    $idPelatihan = HCrypt::Decrypt($idPelatihan);
    $Pelatihan = Pelatihan::findOrFail($idPelatihan);
    $Tipe = studly_case($Pelatihan->TipeText);
    return view("PesertaPelatihan.{$Tipe}.Data", compact('Pelatihan'));
  }

  public function TambahForm($idPelatihan){
    $idPelatihan = HCrypt::Decrypt($idPelatihan);
    $Pelatihan = Pelatihan::findOrFail($idPelatihan);
    $Tipe = studly_case($Pelatihan->TipeText);
    switch ($Pelatihan->tipe) {
      case 1:
        $Peserta = Penyuluh::all();
        break;
      case 2:
        $Peserta = KelompokTani::all();
        break;
      case 3:
        $Peserta = P4S::all();
        break;
      default:
        $Peserta = null;
        break;
    }
    return view("PesertaPelatihan.{$Tipe}.Tambah", compact('Pelatihan', 'Peserta'));
  }

  public function TambahSubmit(Request $request, $idPelatihan){
    $idPelatihan = HCrypt::Decrypt($idPelatihan);
    $Pelatihan = Pelatihan::findOrFail($idPelatihan);
    switch ($Pelatihan->tipe) {
      case 1:
        $Pelatihan->Penyuluh()->sync($request->id);
        break;
      case 2:
        $Pelatihan->KelompokTani()->sync($request->id);
        break;
      case 3:
        $Pelatihan->P4S()->sync($request->id);
        break;
      default:
        return abort(404);
        break;
    }
  return redirect()->Route('pesertaPelatihanData', ['id' => $Pelatihan->UUID])->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Hapus($idPelatihan, $Id=null, $Verify=null){
    if ($Verify) {
      $idPelatihan = HCrypt::Decrypt($idPelatihan);
      $Id = HCrypt::Decrypt($Id);
      $Pelatihan = Pelatihan::findOrFail($idPelatihan);
      switch ($Pelatihan->tipe) {
        case 1:
        $Pelatihan->Penyuluh()->detach($Id);
        break;
        case 2:
        $Pelatihan->KelompokTani()->detach($Id);
        break;
        case 3:
        $Pelatihan->P4S()->detach($Id);
        break;
        default:
        return abort(404);
        break;
      }
      return redirect()->Route('pesertaPelatihanData', ['id' => $Pelatihan->UUID])->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Hapus Data Berhasil']);
    }
    return abort(404);
  }
}

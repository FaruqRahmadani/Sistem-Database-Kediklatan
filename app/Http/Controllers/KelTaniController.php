<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\Komoditas;
use App\Penyuluh;
use App\Kota;
use HCrypt;

class KelTaniController extends Controller
{
  public function Data(){
    $KelompokTani = KelompokTani::all();
    return view('KelompokTani.Data', compact('KelompokTani'));
  }

  public function TambahForm(){
    $Penyuluh = Penyuluh::all();
    return view('KelompokTani.Tambah', compact('Penyuluh'));
  }

  public function TambahSubmit(Request $request){
    $Kota = Kota::findOrFail($request->kota_id);
    $KelompokTani = new KelompokTani;
    $KelompokTani->fill($request->all());
    $KelompokTani->save();
    foreach ($request->komoditas_id as $KomoditasId) {
      if ($Kota->Komoditas->pluck('id')->search($KomoditasId) === false) {
        $Kota->Komoditas()->attach($KomoditasId);
      }
      $KelompokTani->Komoditas()->attach($KomoditasId);
    }
    return redirect()->Route('kelompokTaniData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = HCrypt::Decrypt($Id);
    $KelompokTani = KelompokTani::findOrFail($Id);
    $Komoditas = Komoditas::all();
    $Penyuluh = Penyuluh::all();
    return view('KelompokTani.Edit', compact('KelompokTani', 'Komoditas', 'Penyuluh'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $KelompokTani = KelompokTani::findOrFail($Id);
    $Kota = Kota::findOrFail($request->kota_id);
    foreach ($request->komoditas_id as $KomoditasId) {
      if ($Kota->Komoditas->pluck('id')->search($KomoditasId) === false) {
        $Kota->Komoditas()->attach($KomoditasId);
      }
    }
    $KelompokTani->fill($request->all());
    $KelompokTani->Komoditas()->sync($request->komoditas_id);
    $KelompokTani->save();
    return redirect()->Route('kelompokTaniData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Hapus($Id=null,$Verify=null){
    if ($Verify) {
      $Id = HCrypt::Decrypt($Id);
      $KelompokTani = KelompokTani::findOrFail($Id);
      $KelompokTani->Komoditas()->detach();
      $KelompokTani->delete();
      return redirect()->Route('kelompokTaniData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Hapus Data Berhasil']);
    }
    return abort(404);
  }
}

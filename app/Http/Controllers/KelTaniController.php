<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\Komoditas;
use App\Penyuluh;
use Storage;
use HCrypt;

class KelTaniController extends Controller
{
  public function Data(){
    $KelompokTani = KelompokTani::all();
    return view('KelompokTani.Data', compact('KelompokTani'));
  }

  public function TambahForm(){
    $Komoditas = Komoditas::all();
    $Penyuluh = Penyuluh::all();
    return view('KelompokTani.Tambah', compact('Komoditas', 'Penyuluh'));
  }

  public function TambahSubmit(Request $request){
    $KelompokTani = new KelompokTani;
    $KelompokTani->fill($request->all());
    $KelompokTani->foto = $request->foto->store('public/img/kelompokTani');
    $KelompokTani->save();
    $KelompokTani->Komoditas()->sync($request->komoditas_id);
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
    $KelompokTani->fill($request->all());
    if ($request->foto) {
      if ($KelompokTani->foto != 'default.png') {
        Storage::delete($KelompokTani->foto);
      }
      $KelompokTani->foto = $request->foto->store('public/img/kelompokTani');
    }
    $KelompokTani->save();
    $KelompokTani->Komoditas()->sync($request->komoditas_id);
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

<?php

namespace App\Http\Controllers;

use App\Exports\KelompokTaniExport;
use Illuminate\Http\Request;
use App\KelompokTani;
use App\Komoditas;
use App\Penyuluh;
use App\Kota;
use HCrypt;
use Excel;
use File;

class KelTaniController extends Controller
{
  public function Data(){
    $KelompokTani = KelompokTani::all();
    return view('KelompokTani.Data', compact('KelompokTani'));
  }

  public function detail($id){
    $id = HCrypt::Decrypt($id);
    $KelompokTani = KelompokTani::findOrFail($id);
    return view('KelompokTani.Detail', compact('KelompokTani'));
  }

  public function TambahForm(){
    $Penyuluh = Penyuluh::all();
    return view('KelompokTani.Tambah', compact('Penyuluh'));
  }

  public function TambahSubmit(Request $request){
    $Kota = Kota::findOrFail($request->kota_id);
    $KelompokTani = new KelompokTani;
    $KelompokTani->fill($request->all());
    $FotoExt = $request->foto->getClientOriginalExtension();
    $FotoName = "$request->nama.$request->_token";
    $Foto = "{$FotoName}.{$FotoExt}";
    $KelompokTani->foto = $request->foto->move('img/kelTani', $Foto);
    $KelompokTani->save();
    foreach ($request->komoditas_id as $KomoditasId) {
      if ($Kota->Komoditas->pluck('id')->search($KomoditasId) === false) {
        $Kota->Komoditas()->attach($KomoditasId);
      }
      $KelompokTani->Komoditas()->attach($KomoditasId);
    }
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
    $Kota = Kota::findOrFail($request->kota_id);
    foreach ($request->komoditas_id as $KomoditasId) {
      if ($Kota->Komoditas->pluck('id')->search($KomoditasId) === false) {
        $Kota->Komoditas()->attach($KomoditasId);
      }
    }
    $KelompokTani->fill($request->all());
    if ($request->foto) {
      if ($KelompokTani->foto != 'default.png') {
        File::delete($KelompokTani->foto);
      }
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $KelompokTani->foto = $request->foto->move('img/kelTani', $Foto);
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

  public function exportData(){
    return Excel::download(new KelompokTaniExport(), 'Data Kelompok Tani.xlsx');
  }
}

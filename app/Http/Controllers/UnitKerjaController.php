<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;

use App\UnitKerja;

class UnitKerjaController extends Controller
{
  public function Data(){
    $UnitKerja = UnitKerja::all();
    return view('UnitKerja.Data', compact('UnitKerja'));
  }

  public function TambahForm(){
    return view('UnitKerja.Tambah');
  }

  public function TambahSubmit(Request $request){
    $UnitKerja = new UnitKerja;
    $UnitKerja->fill($request->all());
    $UnitKerja->save();
    return redirect()->Route('unitKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = HCrypt::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    return view('UnitKerja.Edit', compact('UnitKerja'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    $UnitKerja->fill($request->all());
    $UnitKerja->save();
    return redirect()->Route('unitKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Hapus($Id=null,$Verify=null){
    if ($Verify) {
      $Id = HCrypt::Decrypt($Id);
      $UnitKerja = UnitKerja::findOrFail($Id);
      $UnitKerja->delete();
      return redirect()->Route('unitKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
    }
    return abort(404);
  }
}

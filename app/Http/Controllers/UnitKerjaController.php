<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypter;

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

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    return view('UnitKerja.Edit', compact('UnitKerja'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    $UnitKerja->fill($request->all());
    $UnitKerja->save();
    return redirect()->Route('unitKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    $UnitKerja->delete();
    return redirect()->Route('unitKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

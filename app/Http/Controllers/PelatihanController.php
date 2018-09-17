<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelatihan;
use Crypter;

class PelatihanController extends Controller
{
  public function Data(){
    $Pelatihan = Pelatihan::all();
    return view('Pelatihan.Data', compact('Pelatihan'));
  }

  public function TambahForm(){
    return view('Pelatihan.Tambah');
  }

  public function TambahSubmit(Request $request){
    $Pelatihan = new Pelatihan;
    $Pelatihan->fill($request->all());
    $Pelatihan->save();
    return redirect()->Route('pelatihanData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Pelatihan = Pelatihan::findOrFail($Id);
    return view('Pelatihan.Edit', compact('Pelatihan'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Pelatihan = Pelatihan::findOrFail($Id);
    $Pelatihan->fill($request->all());
    $Pelatihan->save();
    return redirect()->Route('pelatihanData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $Pelatihan = Pelatihan::findOrFail($Id);
    $Pelatihan->delete();
    return redirect()->Route('pelatihanData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }
}

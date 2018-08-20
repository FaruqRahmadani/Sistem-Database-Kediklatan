<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\Komoditas;

class KomoditasController extends Controller
{
  public function Data(){
    $Komoditas = Komoditas::all();
    return view('Komoditas.Data', compact('Komoditas'));
  }

  public function Tambah(){
    return view('Komoditas.Tambah');
  }

  public function submitTambah(Request $request){
    $Komoditas = new Komoditas;
    $Komoditas->fill($request->all());
    $Komoditas->save();
    return redirect()->Route('Data-Komoditas')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    return view('Komoditas.Edit', compact('Komoditas'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    $Komoditas->fill($request->all());
    $Komoditas->save();
    return redirect()->Route('Data-Komoditas')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    $Komoditas->delete();
    return redirect()->Route('Data-Komoditas')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use HCrypt;

class KomoditasController extends Controller
{
  public function Data(){
    $Komoditas = Komoditas::all();
    return view('Komoditas.Data', compact('Komoditas'));
  }

  public function TambahForm(){
    return view('Komoditas.Tambah');
  }

  public function TambahSubmit(Request $request){
    $Komoditas = new Komoditas;
    $Komoditas->fill($request->all());
    $Komoditas->save();
    return redirect()->Route('komoditasData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = HCrypt::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    return view('Komoditas.Edit', compact('Komoditas'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    $Komoditas->fill($request->all());
    $Komoditas->save();
    return redirect()->Route('komoditasData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = HCrypt::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    $Komoditas->delete();
    return redirect()->Route('komoditasData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

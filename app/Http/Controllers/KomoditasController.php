<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\Komoditas;

class KomoditasController extends Controller
{
  public function Data(){
    $Komoditas = Komoditas::all();
    return view('User.Komoditas.Data', ['Komoditas' => $Komoditas]);
  }

  public function Tambah(){
    return view('User.Komoditas.Tambah');
  }

  public function submitTambah(Request $request){
    $Komoditas = new Komoditas;
    $Komoditas->fill($request->all());
    $Komoditas->save();

    return redirect(route('Data-Komoditas'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);

    return view('User.Komoditas.Edit', ['Komoditas' => $Komoditas]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    $Komoditas->fill($request->all());
    $Komoditas->save();

    return redirect(route('Data-Komoditas'))->with('success', 'Edit Data Berhasil');
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $Komoditas = Komoditas::findOrFail($Id);
    $Komoditas->delete();

    return redirect(route('Data-Komoditas'))->with('success', 'Delete Data Berhasil');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\KelompokTani;
use App\Komoditas;

class KelTaniController extends Controller
{
  public function Data(){
    $KelompokTani = KelompokTani::all();

    return view('User.KelompokTani.Data', ['KelompokTani' => $KelompokTani]);
  }

  public function Tambah(){
    $Komoditas = Komoditas::all();

    return view('User.KelompokTani.Tambah', ['Komoditas' => $Komoditas]);
  }

  public function submitTambah(Request $request){
    $KelompokTani = new KelompokTani;
    $KelompokTani->fill($request->all());
    $KelompokTani->save();
    foreach ($request->komoditas_id as $KomoditasId) {
      $KelompokTani->Komoditas()->attach($KomoditasId);
    }

    return redirect(route('Data-Kelompok-Tani'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $KelompokTani = KelompokTani::findOrFail($Id);
    $Komoditas = Komoditas::all();

    return view('User.KelompokTani.Edit', ['KelompokTani' => $KelompokTani, 'Komoditas' => $Komoditas]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $KelompokTani = KelompokTani::findOrFail($Id);
    $KelompokTani->fill($request->all());
    $KelompokTani->save();
  }
}

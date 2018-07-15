<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\KelompokTani;
use App\Komoditas;
use App\Penyuluh;

class KelTaniController extends Controller
{
  public function Data(){
    $KelompokTani = KelompokTani::all();

    return view('KelompokTani.Data', ['KelompokTani' => $KelompokTani]);
  }

  public function Tambah(){
    $Komoditas = Komoditas::all();
    $Penyuluh = Penyuluh::all();

    return view('KelompokTani.Tambah', ['Komoditas' => $Komoditas, 'Penyuluh' => $Penyuluh]);
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
    $Penyuluh = Penyuluh::all();

    return view('KelompokTani.Edit', ['KelompokTani' => $KelompokTani, 'Komoditas' => $Komoditas, 'Penyuluh' => $Penyuluh]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $KelompokTani = KelompokTani::findOrFail($Id);
    $KelompokTani->fill($request->all());
    $KelompokTani->Komoditas()->sync($request->komoditas_id);
    $KelompokTani->save();

    return redirect(route('Data-Kelompok-Tani'))->with('success', 'Edit Data Berhasil');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\KelompokTani;
use App\KotaKomoditas;
use App\Komoditas;
use App\Kota;

class KotaKomoditasController extends Controller
{
  public function Data(){
    $Kota = Kota::has('komoditas')
                ->get();

    return view('User.KotaKomoditas.Data', ['Kota' => $Kota]);
  }

  public function Tambah(){
    $Komoditas = Komoditas::all();
    return view('User.KotaKomoditas.Tambah', ['Komoditas' => $Komoditas]);
  }

  public function submitTambah(Request $request){
    $Kota = Kota::findOrFail($request->kota_id);
    $Kota->Komoditas()->sync($request->komoditas_id);

    return redirect(route('Data-Kota-Komoditas'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Kota = Kota::findOrFail($Id);
    $Komoditas = Komoditas::all();

    return view('User.KotaKomoditas.Edit', ['Kota' => $Kota, 'Komoditas' => $Komoditas]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Kota = Kota::findOrFail($Id);
    $Kota->Komoditas()->sync($request->komoditas_id);

    return redirect(route('Data-Kota-Komoditas'))->with('success', 'Edit Data Berhasil');
  }
}

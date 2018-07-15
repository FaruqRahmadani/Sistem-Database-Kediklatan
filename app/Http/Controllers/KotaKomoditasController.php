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

    return view('KotaKomoditas.Data', ['Kota' => $Kota]);
  }

  public function Tambah(){
    $Komoditas = Komoditas::all();
    return view('KotaKomoditas.Tambah', ['Komoditas' => $Komoditas]);
  }

  public function submitTambah(Request $request){
    $Kota = Kota::findOrFail($request->kota_id);
    $Kota->Komoditas()->sync($request->komoditas_id);

    return redirect()->Route('Data-Kota-Komoditas')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Kota = Kota::findOrFail($Id);
    $Komoditas = Komoditas::all();

    return view('KotaKomoditas.Edit', ['Kota' => $Kota, 'Komoditas' => $Komoditas]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Kota = Kota::findOrFail($Id);
    $Kota->Komoditas()->sync($request->komoditas_id);

    return redirect()->Route('Data-Kota-Komoditas')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }
}

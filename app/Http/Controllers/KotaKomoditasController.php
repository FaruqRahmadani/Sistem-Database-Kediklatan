<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KotaKomoditas;
use App\KelompokTani;
use App\Komoditas;
use App\Kota;
use HCrypt;

class KotaKomoditasController extends Controller
{
  public function Data(){
    $Kota = Kota::has('komoditas')
                ->get();
    return view('KotaKomoditas.Data', compact('Kota'));
  }

  public function TambahForm(){
    $Komoditas = Komoditas::all();
    return view('KotaKomoditas.Tambah', compact('Komoditas'));
  }

  public function TambahSubmit(Request $request){
    $Kota = Kota::findOrFail($request->kota_id);
    $Kota->Komoditas()->sync($request->komoditas_id);
    return redirect()->Route('kotaKomoditasData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = HCrypt::Decrypt($Id);
    $Kota = Kota::findOrFail($Id);
    $Komoditas = Komoditas::all();
    return view('KotaKomoditas.Edit', compact('Kota', 'Komoditas'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Kota = Kota::findOrFail($Id);
    $Kota->Komoditas()->sync($request->komoditas_id);
    return redirect()->Route('kotaKomoditasData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }
}

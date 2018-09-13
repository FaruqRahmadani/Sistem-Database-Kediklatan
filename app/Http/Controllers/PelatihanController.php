<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelatihan;

class PelatihanController extends Controller
{
  public function Data(){
    $Pelatihan = Pelatihan::all();
    return view('Pelatihan.Data', compact('Pelatihan'));
  }

  public function Tambah(){
    return view('Pelatihan.Tambah');
  }

  public function submitTambah(Request $request){
    $Pelatihan = new Pelatihan;
    $Pelatihan->fill($request->all());
    $Pelatihan->save();
    return redirect()->Route('Data-Pelatihan')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }
}

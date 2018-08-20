<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypter;

use App\Penyuluh;

class PenyuluhController extends Controller
{
  public function Data(){
    $Penyuluh = Penyuluh::all();
    return view('Penyuluh.Data', compact('Penyuluh'));
  }

  public function Tambah(){
    return view('Penyuluh.Tambah');
  }

  public function submitTambah(Request $request){
    $Penyuluh = new Penyuluh;
    $Penyuluh->fill($request->all());
    $Penyuluh->save();
    return redirect()->Route('Data-Penyuluh')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    return view('Penyuluh.Edit', compact('Penyuluh'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    $Penyuluh->fill($request->all());
    $Penyuluh->save();
    return redirect()->Route('Data-Penyuluh')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    $Penyuluh->delete();
    return redirect()->Route('Data-Penyuluh')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

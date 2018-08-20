<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\P4S;
use Crypter;

class P4SController extends Controller
{
  public function Data(){
    $P4S = P4S::all();
    return view('P4S.Data', compact('P4S'));
  }

  public function Tambah(){
    return view('P4S.Tambah');
  }

  public function submitTambah(Request $request){
    $P4S = new P4S;
    $P4S->fill($request->all());
    $P4S->save();
    return redirect()->route('Data-P4S')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
    return view('P4S.Edit', compact('P4S'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
    $P4S->fill($request->all());
    $P4S->save();
    return redirect()->route('Data-P4S')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
    $P4S->delete();
    return redirect()->route('Data-P4S')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Hapus Data Berhasil']);
  }
}

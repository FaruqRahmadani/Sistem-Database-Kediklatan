<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\User;

class UserController extends Controller
{
  public function Data(){
    $User = User::all();
    return view('User.Data', compact('User'));
  }

  public function Tambah(){
    return view('User.Tambah');
  }

  public function submitTambah(Request $request){
    $User = new User;
    $User->fill($request->all());
    $User->save();
    return redirect()->Route('Data-User')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $User = User::findOrFail($Id);
    return view('User.Edit', compact('User'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $User = User::findOrFail($Id);
    $User->fill($request->all());
    $User->save();
    return redirect()->Route('Data-User')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $User = User::findOrFail($Id);
    $User->delete();
    return redirect()->Route('Data-User')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

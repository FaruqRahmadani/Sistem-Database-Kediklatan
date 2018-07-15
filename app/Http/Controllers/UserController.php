<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypter;

use App\User;

class UserController extends Controller
{
  public function Data(){
    $User = User::all();

    return view('User.Data', ['User' => $User]);
  }

  public function Tambah(){
    return view('User.Tambah');
  }

  public function submitTambah(Request $request){
    $User = new User;
    $User->fill($request->all());
    $User->save();

    return redirect(route('Data-User'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $User = User::findOrFail($Id);

    return view('User.Edit', ['User' => $User]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $User = User::findOrFail($Id);
    $User->fill($request->all());
    $User->save();

    return redirect(route('Data-User'))->with('success', 'Edit Data Berhasil');
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $User = User::findOrFail($Id);
    $User->delete();

    return redirect(route('Data-User'))->with('success', 'Hapus Data Berhasil');
  }
}

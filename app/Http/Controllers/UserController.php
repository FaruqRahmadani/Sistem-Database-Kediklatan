<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

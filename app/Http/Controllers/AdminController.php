<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
  public function data(){
    $admin = Admin::all();
    return view('Admin.Data', compact('admin'));
  }

  public function tambahForm(){
    return view('Admin.Tambah');
  }

  public function tambahSubmit(Request $request){
    $userControleler = new UserController;
    $user = $userControleler->TambahSubmit($request, 5);
    $admin = new Admin;
    $admin->fill($request->all());
    $admin->user_id = $user->id;
    if ($request->foto) {
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $admin->foto = $request->foto->move('img/admin', $Foto);
    }
    $admin->save();
    return redirect()->Route('adminData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }
}
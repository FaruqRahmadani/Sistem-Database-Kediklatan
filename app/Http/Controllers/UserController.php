<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Validator;
use App\User;
use HCrypt;

class UserController extends Controller
{
  public function Data(){
    $User = User::all();
    return view('User.Data', compact('User'));
  }

  public function TambahForm(){
    return view('User.Tambah');
  }

  public function TambahSubmit(Request $request){
    Validator::make($request->all(),[
      'username' => Rule::unique('users'),
    ])->validate();
    $User = new User;
    $User->fill($request->all());
    $User->save();
    return redirect()->Route('userData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
    }

    public function EditForm($Id){
      $Id = HCrypt::Decrypt($Id);
      $User = User::findOrFail($Id);
      return view('User.Edit', compact('User'));
    }

    public function EditSubmit(Request $request, $Id){
      $Id = HCrypt::Decrypt($Id);
      Validator::make($request->all(),[
        'username' => Rule::unique('users')->ignore($Id),
      ])->validate();
      $User = User::findOrFail($Id);
      $User->fill($request->all());
      $User->save();
      return redirect()->Route('userData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
    }

    public function Hapus($Id=null,$Verify=null){
      if ($Verify) {
        $Id = HCrypt::Decrypt($Id);
        $User = User::findOrFail($Id);
        $User->delete();
        return redirect()->Route('userData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Hapus Data Berhasil']);
      }
      return abort(404);
    }
  }

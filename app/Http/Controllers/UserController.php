<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Validator;
use App\User;
use HCrypt;

class UserController extends Controller
{
  public function TambahSubmit($request, $tipe){
    Validator::make($request->all(),[
      'username' => Rule::unique('users'),
    ])->validate();
    $User = new User;
    $User->fill($request->all());
    $User->tipe = $tipe;
    $User->save();
    return $User;
  }

  public function EditSubmit(Request $request, $Id){
    Validator::make($request->all(),[
      'username' => Rule::unique('users')->ignore($Id),
    ])->validate();
    $User = User::findOrFail($Id);
    $User->fill($request->all());
    $User->save();
    return $User;
  }

  public function Hapus($Id=null){
    $User = User::findOrFail($Id);
    $User->delete();
    return $User;
  }
}

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
}

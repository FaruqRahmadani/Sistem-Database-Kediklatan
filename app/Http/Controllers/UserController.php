<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('UserMiddleware');
  }

  public function Dashboard(){
    return view('User.Dashboard');
  }
}

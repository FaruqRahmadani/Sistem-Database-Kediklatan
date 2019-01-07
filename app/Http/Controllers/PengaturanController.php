<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
  public function form(){
    return view('pengaturan.Form');
  }
}

<?php

namespace App\Http\Controllers;

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
}

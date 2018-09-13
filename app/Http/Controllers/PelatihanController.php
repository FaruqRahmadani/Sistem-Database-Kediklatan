<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelatihan;

class PelatihanController extends Controller
{
  public function Data(){
    $Pelatihan = Pelatihan::all();
    return view('Pelatihan.Data', compact('Pelatihan'));
  }
}

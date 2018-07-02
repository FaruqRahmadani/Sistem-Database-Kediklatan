<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\KelompokTani;
use App\Komoditas;

class KelTaniController extends Controller
{
  public function Data(){
    $KelompokTani = KelompokTani::all();

    return view('User.KelompokTani.Data', ['KelompokTani' => $KelompokTani]);
  }

  public function Tambah(){
    $Komoditas = Komoditas::all();

    return view('User.KelompokTani.Tambah', ['Komoditas' => $Komoditas]);
  }
}

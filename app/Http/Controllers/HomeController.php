<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;
use App\P4S;
use Auth;

class HomeController extends Controller
{
  public function ubahData(){
    $auth = Auth::User();
    if ($auth->tipe == 3) return $this->ubahDataP4SForm($auth);
  }

  public function ubahDataP4SForm($auth){
    $P4S = P4S::findOrFail($auth->Data->id);
    $Kota = Kota::all();
    return view('PesertaAuth.ubahDataP4S', compact('P4S', 'Kota'));
  }
}

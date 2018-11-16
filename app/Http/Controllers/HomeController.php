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

  public function ubahDataSubmit(Request $request){
    $auth = Auth::User();
    if ($auth->tipe == 3) return $this->ubahDataP4SSubmit($auth, $request);
  }

  public function ubahDataP4SForm($auth){
    $p4s = P4S::findOrFail($auth->Data->id);
    $Kota = Kota::all();
    return view('PesertaAuth.ubahDataP4S', compact('p4s', 'Kota'));
  }

  public function ubahDataP4SSubmit($auth, $request){
    $P4S = P4S::findOrFail($auth->Data->id);
    $P4S->fill($request->all());
    if ($request->foto) {
      if (!str_is('*default.png', $P4S->foto)) {
        File::delete($P4S->foto);
      }
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $P4S->foto = $request->foto->move('img/P4S', $Foto);
    }
    $P4S->save();
    return redirect()->route('Dashboard')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\Penyuluh;
use App\P4S;
use App\User;
use App\Kota;
use Auth;
use File;
use Hash;

class HomeController extends Controller
{
  public function ubahData(){
    $auth = Auth::User();
    if ($auth->tipe == 2) return $this->ubahDataKelTaniForm($auth);
    if ($auth->tipe == 3) return $this->ubahDataP4SForm($auth);
  }

  public function ubahDataSubmit(Request $request){
    $auth = Auth::User();
    if ($auth->tipe == 3) return $this->ubahDataP4SSubmit($auth, $request);
  }

  public function ubahDataKelTaniForm($auth){
    $KelompokTani = KelompokTani::findOrFail($auth->Data->id);
    $Penyuluh = Penyuluh::all();
    return view('PesertaAuth.ubahDataKelompokTani', compact('KelompokTani', 'Penyuluh'));
  }

  public function ubahDataP4SForm($auth){
    $P4S = P4S::findOrFail($auth->Data->id);
    $Kota = Kota::all();
    return view('PesertaAuth.ubahDataP4S', compact('P4S', 'Kota'));
  }

  public function ubahDataP4SSubmit($auth, $request){
    $P4S = P4S::findOrFail($auth->Data->id);
    $validate = User::whereUsername($request->nip)->where('id', '!=', $P4S->user_id)->count();
    if ($validate) return redirect()->back()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'NIK/NIP Sudah Ada']);
    $user = User::firstOrNew(['id' => $P4S->user_id]);
    $user->username = $request->nip;
    $user->save();
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

  public function ubahAuth(){
    return view('PesertaAuth.ubahAuth');
  }

  public function ubahAuthSubmit(Request $request){
    $auth = Auth::User();
    $user = User::findOrFail($auth->id);
    if (!Hash::check($request->password_old, $user->password)) return redirect()->back()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'Password Lama Salah']);
    $this->validate($request, [
      'password' => 'confirmed',
    ]);
    $user->fill($request->all());
    $user->save();
    return redirect()->route('Dashboard')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }
}

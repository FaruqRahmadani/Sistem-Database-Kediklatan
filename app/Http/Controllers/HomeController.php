<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokTani;
use App\SatuanKerja;
use App\UnitKerja;
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
    if ($auth->tipe == 1) return $this->ubahDataPenyuluhForm($auth);
    if ($auth->tipe == 2) return $this->ubahDataKelTaniForm($auth);
    if ($auth->tipe == 3) return $this->ubahDataP4SForm($auth);
  }

  public function ubahDataSubmit(Request $request){
    $auth = Auth::User();
    if ($auth->tipe == 1) return $this->ubahDataPenyuluhSubmit($auth, $request);
    if ($auth->tipe == 2) return $this->ubahDataKelTaniSubmit($auth, $request);
    if ($auth->tipe == 3) return $this->ubahDataP4SSubmit($auth, $request);
  }

  public function ubahDataPenyuluhForm($auth){
    $Penyuluh = Penyuluh::findOrFail($auth->Data->id);
    $SatuanKerja = SatuanKerja::all();
    $UnitKerja = UnitKerja::all();
    return view('PesertaAuth.ubahDataPenyuluh', compact('Penyuluh', 'SatuanKerja', 'UnitKerja'));
  }

  public function ubahDataPenyuluhSubmit($auth, $request){
    $Penyuluh = Penyuluh::findOrFail($auth->Data->id);
    $validate = User::whereUsername($request->nip)->where('id', '!=', $Penyuluh->user_id)->count();
    if ($validate) return redirect()->back()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'NIK/NIP Sudah Ada']);
    $user = User::firstOrNew(['id' => $Penyuluh->user_id]);
    $user->username = $request->nip;
    $user->save();
    $Penyuluh->fill($request->all());
    if ($request->foto) {
      if (!str_is('*default.png', $Penyuluh->foto)) {
        File::delete($Penyuluh->foto);
      }
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "[$request->nip]$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $Penyuluh->foto = $request->foto->move('img/penyuluh', $Foto);
    }
    $Penyuluh->save();
    return redirect()->Route('Dashboard')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function ubahDataKelTaniForm($auth){
    $KelompokTani = KelompokTani::findOrFail($auth->Data->id);
    $Penyuluh = Penyuluh::all();
    return view('PesertaAuth.ubahDataKelompokTani', compact('KelompokTani', 'Penyuluh'));
  }

  public function ubahDataKelTaniSubmit($auth, $request){
    $KelompokTani = KelompokTani::findOrFail($auth->Data->id);
    $validate = User::whereUsername($request->nip)->where('id', '!=', $KelompokTani->user_id)->count();
    if ($validate) return redirect()->back()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'NIK/NIP Sudah Ada']);
    $user = User::firstOrNew(['id' => $KelompokTani->user_id]);
    $user->username = $request->nip;
    $user->save();
    $KelompokTani->fill($request->all());
    if ($request->foto) {
      if (!str_is('*default.png', $KelompokTani->foto)) {
        File::delete($KelompokTani->foto);
      }
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $KelompokTani->foto = $request->foto->move('img/kelTani', $Foto);
    }
    $KelompokTani->save();
    if ($request->komoditas_id) {
      $Kota = Kota::findOrFail($request->kota_id);
      foreach ($request->komoditas_id as $KomoditasId) {
        if ($Kota->Komoditas->pluck('id')->search($KomoditasId) === false) {
          $Kota->Komoditas()->attach($KomoditasId);
        }
      }
    }
    $KelompokTani->Komoditas()->sync($request->komoditas_id);
    return redirect()->Route('Dashboard')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
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

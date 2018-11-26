<?php

namespace App\Http\Controllers;

use App\Exports\PenyuluhExport;
use Illuminate\Http\Request;
use App\Penyuluh;
use App\User;
use Storage;
use HCrypt;
use Excel;
use File;

class PenyuluhController extends Controller
{
  public function Data(){
    $Penyuluh = Penyuluh::all();
    return view('Penyuluh.Data', compact('Penyuluh'));
  }

  public function detail($Id){
    $Id = HCrypt::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    return view('Penyuluh.Detail', compact('Penyuluh'));
  }

  public function TambahForm(){
    return view('Penyuluh.Tambah');
  }

  public function TambahSubmit(Request $request){
    $user = User::firstOrNew(['username' => $request->nip]);
    if ($user->id) return redirect()->back()->withInput()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'NIK/NIP Sudah Ada']);
    $user->password = 12345;
    $user->tipe = 1;
    $user->save();
    $Penyuluh = new Penyuluh;
    $Penyuluh->fill($request->all());
    $Penyuluh->user_id = $user->id;
    if ($request->foto) {
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "[$request->nip]$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $Penyuluh->foto = $request->foto->move('img/penyuluh', $Foto);
    }
    $Penyuluh->save();
    return redirect()->Route('penyuluhData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = HCrypt::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    return view('Penyuluh.Edit', compact('Penyuluh'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    $validate = User::whereUsername($request->nip)->where('id', '!=', $Penyuluh->user_id??0)->count();
    if ($validate) return redirect()->back()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'NIK/NIP Sudah Ada']);
    $user = User::firstOrNew(['username' => $Penyuluh->nip]);
    if (!$Penyuluh->user_id) {
      $user->password = 12345;
      $user->tipe = 1;
    }
    $user->username = $request->nip;
    $user->save();
    $Penyuluh->fill($request->all());
    if (!$Penyuluh->user_id) $Penyuluh->user_id = $user->id;
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
    return redirect()->Route('penyuluhData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Hapus($Id=null, $Verify=null){
    if ($Verify) {
      $Id = HCrypt::Decrypt($Id);
      $Penyuluh = Penyuluh::findOrFail($Id);
      $Penyuluh->delete();
      return redirect()->Route('penyuluhData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
    }
    return abort(404);
  }

  public function exportData(){
    return Excel::download(new PenyuluhExport(), 'Data Penyuluh.xlsx');
  }
}

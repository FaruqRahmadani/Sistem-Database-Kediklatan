<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\P4SExport;
use App\Kota;
use App\User;
use App\P4S;
use Storage;
use HCrypt;
use Excel;
use File;

class P4SController extends Controller
{
  public function Data(){
    $P4S = P4S::all();
    return view('P4S.Data', compact('P4S'));
  }

  public function detail($id){
    $id = HCrypt::Decrypt($id);
    $p4s = P4S::findOrFail($id);
    return view('P4S.Detail', compact('p4s'));
  }

  public function TambahForm(){
    $Kota = Kota::all();
    return view('P4S.Tambah', compact('Kota'));
  }

  public function TambahSubmit(Request $request){
    $user = User::firstOrNew(['username' => $request->nip]);
    if ($user->id) return redirect()->back()->withInput()->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Ada Masalah', 'pesan' => 'NIK/NIP Sudah Ada']);
    $user->password = 12345;
    $user->tipe = 3;
    $user->save();
    $P4S = new P4S;
    $P4S->fill($request->all());
    $P4S->user_id = $user->id;
    if ($request->foto) {
      $FotoExt = $request->foto->getClientOriginalExtension();
      $FotoName = "$request->nama.$request->_token";
      $Foto = "{$FotoName}.{$FotoExt}";
      $P4S->foto = $request->foto->move('img/P4S', $Foto);
    }
    $P4S->save();
    return redirect()->route('p4sData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Kota = Kota::all();
    $Id = HCrypt::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
    return view('P4S.Edit', compact('P4S', 'Kota'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
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
    return redirect()->route('p4sData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Hapus($Id=null,$Verify=null){
    if ($Verify) {
      $Id = HCrypt::Decrypt($Id);
      $P4S = P4S::findOrFail($Id);
      $P4S->delete();
      return redirect()->route('p4sData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Hapus Data Berhasil']);
    }
    return abort(404);
  }

  public function exportData(){
    return Excel::download(new P4SExport(), 'Data P4S.xlsx');
  }
}

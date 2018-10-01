<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\P4S;
use Storage;
use HCrypt;
use File;

class P4SController extends Controller
{
  public function Data(){
    $P4S = P4S::all();
    return view('P4S.Data', compact('P4S'));
  }

  public function TambahForm(){
    return view('P4S.Tambah');
  }

  public function TambahSubmit(Request $request){
    $P4S = new P4S;
    $P4S->fill($request->all());
    $FotoExt = $request->foto->getClientOriginalExtension();
    $FotoName = "$request->nama.$request->_token";
    $Foto = "{$FotoName}.{$FotoExt}";
    $P4S->foto = $request->foto->move('img/P4S', $Foto);
    $P4S->save();
    return redirect()->route('p4sData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = HCrypt::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
    return view('P4S.Edit', compact('P4S'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $P4S = P4S::findOrFail($Id);
    $P4S->fill($request->all());
    if ($request->foto) {
      if ($P4S->foto != 'default.png') {
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
}

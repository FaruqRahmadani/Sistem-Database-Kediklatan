<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PenyuluhExport;
use App\Penyuluh;
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

  public function TambahForm(){
    return view('Penyuluh.Tambah');
  }

  public function TambahSubmit(Request $request){
    $Penyuluh = new Penyuluh;
    $Penyuluh->fill($request->all());
    $FotoExt = $request->foto->getClientOriginalExtension();
    $FotoName = "[$request->nip]$request->nama.$request->_token";
    $Foto = "{$FotoName}.{$FotoExt}";
    $Penyuluh->foto = $request->foto->move('img/penyuluh', $Foto);
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
    $Penyuluh->fill($request->all());
    if ($request->foto) {
      if ($Penyuluh->foto != 'default.png') {
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

  public function exportData(Excel $excel, PenyuluhExport $export){
    return Excel::download(new PenyuluhExport(), 'Data Penyuluh.xlsx');
  }
}

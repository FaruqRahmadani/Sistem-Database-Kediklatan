<?php

namespace App\Http\Controllers;

use Datatables;
use Crypter;

use Illuminate\Http\Request;
use App\SatuanKerja;

class SatuanKerjaController extends Controller
{
  public function Data(){
    $SatKerja = SatuanKerja::all();
    return view('SatuanKerja.Data', compact('SatKerja'));
  }

  public function TambahForm(){
    return view('SatuanKerja.Tambah');
  }

  public function TambahSubmit(Request $request){
    $SatKerja = new SatuanKerja;
    $SatKerja->fill($request->all());
    $SatKerja->save();
    return redirect()->Route('satuanKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    return view('SatuanKerja.Edit', compact('SatKerja'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->fill($request->all());
    $SatKerja->save();
    return redirect()->Route('satuanKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Hapus($Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->delete();
    return redirect()->Route('satuanKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

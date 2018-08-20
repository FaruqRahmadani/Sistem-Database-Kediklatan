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

  public function Tambah(){
    return view('SatuanKerja.Tambah');
  }

  public function submitTambah(Request $request){
    $SatKerja = new SatuanKerja;
    $SatKerja->fill($request->all());
    $SatKerja->save();
    return redirect()->Route('Data-Satuan-Kerja')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    return view('SatuanKerja.Edit', compact('SatKerja'));
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->fill($request->all());
    $SatKerja->save();
    return redirect()->Route('Data-Satuan-Kerja')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->delete();
    return redirect()->Route('Data-Satuan-Kerja')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Delete Data Berhasil']);
  }
}

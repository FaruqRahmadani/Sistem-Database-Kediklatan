<?php

namespace App\Http\Controllers;

use Datatables;
use HCrypt;

use Illuminate\Http\Request;
use App\SatuanKerja;
use App\Kota;

class SatuanKerjaController extends Controller
{
  public function Data(){
    $SatKerja = SatuanKerja::all();
    return view('SatuanKerja.Data', compact('SatKerja'));
  }

  public function TambahForm(){
    $Kota = Kota::all();
    return view('SatuanKerja.Tambah', compact('Kota'));
  }

  public function TambahSubmit(Request $request){
    $SatKerja = new SatuanKerja;
    $SatKerja->fill($request->all());
    $SatKerja->save();
    return redirect()->Route('satuanKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Tambah Data Berhasil']);
  }

  public function EditForm($Id){
    $Kota = Kota::all();
    $Id = HCrypt::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    return view('SatuanKerja.Edit', compact('SatKerja', 'Kota'));
  }

  public function EditSubmit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->fill($request->all());
    $SatKerja->save();
    return redirect()->Route('satuanKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Edit Data Berhasil']);
  }

  public function Hapus($Id=null,$Verify=null){
    if ($Verify) {
      $Id = HCrypt::Decrypt($Id);
      $SatKerja = SatuanKerja::findOrFail($Id);
      $SatKerja->delete();
      return redirect()->Route('satuanKerjaData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Hapus Data Berhasil']);
    }
    return abort(404);
  }
}

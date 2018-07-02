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
    return view('User.SatuanKerja.Data', ['SatKerja' => $SatKerja]);
  }

  public function Tambah(){
    return view('User.SatuanKerja.Tambah');
  }

  public function submitTambah(Request $request){
    $SatKerja = new SatuanKerja;
    $SatKerja->fill($request->all());
    $SatKerja->save();

    return redirect(route('Data-Satuan-Kerja'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);

    return view('User.SatuanKerja.Edit', ['SatKerja' => $SatKerja]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->fill($request->all());
    $SatKerja->save();

    return redirect(route('Data-Satuan-Kerja'))->with('success', 'Edit Data Berhasil');
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $SatKerja = SatuanKerja::findOrFail($Id);
    $SatKerja->delete();

    return redirect(route('Data-Satuan-Kerja'))->with('success', 'Delete Data Berhasil');
  }
}

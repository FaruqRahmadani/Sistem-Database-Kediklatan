<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypter;

use App\UnitKerja;

class UnitKerjaController extends Controller
{
  public function Data(){
    $UnitKerja = UnitKerja::all();

    return view('User.UnitKerja.Data', ['UnitKerja' => $UnitKerja]);
  }

  public function Tambah(){
    return view('User.UnitKerja.Tambah');
  }

  public function submitTambah(Request $request){
    $UnitKerja = new UnitKerja;
    $UnitKerja->fill($request->all());
    $UnitKerja->save();

    return redirect(route('Data-Unit-Kerja'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);

    return view('User.UnitKerja.Edit', ['UnitKerja' => $UnitKerja]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    $UnitKerja->fill($request->all());
    $UnitKerja->save();

    return redirect(route('Data-Unit-Kerja'))->with('success', 'Edit Data Berhasil');
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $UnitKerja = UnitKerja::findOrFail($Id);
    $UnitKerja->delete();

    return redirect(route('Data-Unit-Kerja'))->with('success', 'Delete Data Berhasil');
  }
}

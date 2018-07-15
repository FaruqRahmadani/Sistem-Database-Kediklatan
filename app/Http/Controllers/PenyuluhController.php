<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypter;

use App\SatuanKerja;
use App\UnitKerja;
use App\Penyuluh;

class PenyuluhController extends Controller
{
  public function Data(){
    $Penyuluh = Penyuluh::all();
    return view('Penyuluh.Data', ['Penyuluh' => $Penyuluh]);
  }

  public function Tambah(){
    return view('Penyuluh.Tambah');
  }

  public function submitTambah(Request $request){
    if (!$request->satuan_kerja_id) {
      $SatKerja                = new SatuanKerja;
      $SatKerja->nama          = $request->nama_satkerja;
      $SatKerja->alamat        = $request->alamat_satkerja;
      $SatKerja->provinsi_id   = $request->provinsi_id;
      $SatKerja->kota_id       = $request->kota_id;
      $SatKerja->nomor_telepon = $request->nomor_telepon_satkerja;
      $SatKerja->save();
    }
    if (!$request->unit_kerja_id) {
      $UnitKerja         = new UnitKerja;
      $UnitKerja->nama   = $request->nama_unitkerja;
      $UnitKerja->alamat = $request->alamat_unitkerja;
      $UnitKerja->save();
    }
    $Penyuluh = new Penyuluh;
    $Penyuluh->fill($request->all());
    $Penyuluh->satuan_kerja_id = !$request->satuan_kerja_id ? $SatKerja->id : $request->satuan_kerja_id;
    $Penyuluh->unit_kerja_id   = !$request->unit_kerja_id ? $UnitKerja->id : $request->unit_kerja_id;
    $Penyuluh->save();

    return redirect(route('Data-Penyuluh'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);

    return view('Penyuluh.Edit', ['Penyuluh' => $Penyuluh]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);

    if (!$request->satuan_kerja_id) {
      $SatKerja                = new SatuanKerja;
      $SatKerja->nama          = $request->nama_satkerja;
      $SatKerja->alamat        = $request->alamat_satkerja;
      $SatKerja->provinsi_id   = $request->provinsi_id;
      $SatKerja->kota_id       = $request->kota_id;
      $SatKerja->nomor_telepon = $request->nomor_telepon_satkerja;
      $SatKerja->save();
    }
    if (!$request->unit_kerja_id) {
      $UnitKerja         = new UnitKerja;
      $UnitKerja->nama   = $request->nama_unitkerja;
      $UnitKerja->alamat = $request->alamat_unitkerja;
      $UnitKerja->save();
    }
    $Penyuluh->fill($request->all());
    $Penyuluh->satuan_kerja_id = !$request->satuan_kerja_id ? $SatKerja->id : $request->satuan_kerja_id;
    $Penyuluh->unit_kerja_id   = !$request->unit_kerja_id ? $UnitKerja->id : $request->unit_kerja_id;
    $Penyuluh->save();

    return redirect(route('Data-Penyuluh'))->with('success', 'Tambah Data Berhasil');
  }

  public function Delete($Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);
    $Penyuluh->delete();

    return redirect(route('Data-Penyuluh'))->with('success', 'Hapus Data Berhasil');
  }
}

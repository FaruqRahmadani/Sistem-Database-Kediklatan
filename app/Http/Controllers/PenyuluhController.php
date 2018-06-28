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
    return view('User.Penyuluh.Data', ['Penyuluh' => $Penyuluh]);
  }

  public function Tambah(){
    return view('User.Penyuluh.Tambah');
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
    $Penyuluh->nip  = $request->nip;
    $Penyuluh->nama                = $request->nama;
    $Penyuluh->tempat_lahir        = $request->tempat_lahir;
    $Penyuluh->tanggal_lahir       = $request->tanggal_lahir;
    $Penyuluh->agama               = $request->agama;
    $Penyuluh->jenis_kelamin       = $request->jenis_kelamin;
    $Penyuluh->status_kawin        = $request->status_kawin;
    $Penyuluh->pangkat_golongan    = $request->pangkat_golongan;
    $Penyuluh->jabatan             = $request->jabatan;
    $Penyuluh->pendidikan_terakhir = $request->pendidikan_terakhir;
    $Penyuluh->nomor_hp            = $request->nomor_hp;
    $Penyuluh->satuan_kerja_id     = !$request->satuan_kerja_id ? $SatKerja->id : $request->satuan_kerja_id;
    $Penyuluh->unit_kerja_id       = !$request->unit_kerja_id ? $UnitKerja->id : $request->unit_kerja_id;
    $Penyuluh->komoditas_unggulan  = $request->komoditas_unggulan;
    $Penyuluh->pelatihan           = $request->pelatihan;
    $Penyuluh->save();

    return redirect(route('Data-Penyuluh'))->with('success', 'Tambah Data Berhasil');
  }

  public function Edit($Id){
    $Id = Crypter::Decrypt($Id);
    $Penyuluh = Penyuluh::findOrFail($Id);

    return view('User.Penyuluh.Edit', ['Penyuluh' => $Penyuluh]);
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
    $Penyuluh->nip  = $request->nip;
    $Penyuluh->nama                = $request->nama;
    $Penyuluh->tempat_lahir        = $request->tempat_lahir;
    $Penyuluh->tanggal_lahir       = $request->tanggal_lahir;
    $Penyuluh->agama               = $request->agama;
    $Penyuluh->jenis_kelamin       = $request->jenis_kelamin;
    $Penyuluh->status_kawin        = $request->status_kawin;
    $Penyuluh->pangkat_golongan    = $request->pangkat_golongan;
    $Penyuluh->jabatan             = $request->jabatan;
    $Penyuluh->pendidikan_terakhir = $request->pendidikan_terakhir;
    $Penyuluh->nomor_hp            = $request->nomor_hp;
    $Penyuluh->satuan_kerja_id     = !$request->satuan_kerja_id ? $SatKerja->id : $request->satuan_kerja_id;
    $Penyuluh->unit_kerja_id       = !$request->unit_kerja_id ? $UnitKerja->id : $request->unit_kerja_id;
    $Penyuluh->komoditas_unggulan  = $request->komoditas_unggulan;
    $Penyuluh->pelatihan           = $request->pelatihan;
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypter;

class Penyuluh extends Model
{
  protected $fillable = [
    'nip',
    'nama',
    'tempat_lahir',
    'tanggal_lahir',
    'agama',
    'jenis_kelamin',
    'status_kawin',
    'pangkat_golongan',
    'jabatan',
    'pendidikan_terakhir',
    'nomor_hp',
    'satuan_kerja_id',
    'unit_kerja_id',
  ];

  public function SatuanKerja(){
    return $this->belongsTo('App\SatuanKerja');
  }

  public function UnitKerja(){
    return $this->belongsTo('App\UnitKerja');
  }

  public function KelompokTani(){
    return $this->hasMany('App\KelompokTani');
  }

  public function getUUIDAttribute($value){
    return Crypter::Encrypt($this->id);
  }
}

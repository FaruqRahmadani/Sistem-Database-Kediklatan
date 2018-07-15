<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    'satuankerja_id',
    'unitkerja_id',
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
}

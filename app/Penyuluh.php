<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use HCrypt;
use HDate;

class Penyuluh extends Model
{
  use SoftDeletes;
  
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

  public function getNIPNamaAttribute($value){
    return "({$this->nip}) <br> {$this->nama}";
  }

  public function getTTLAttribute($value){
    $tanggalLahir = HDate::DateFormat($this->tanggal_lahir);
    return "{$this->tempat_lahir}, {$tanggalLahir}";
  }

  public function getPangkatJabatanAttribute($value){
    return "{$this->pangkat_golongan}/{$this->jabatan}";
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}

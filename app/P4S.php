<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypter;

class P4S extends Model
{
  protected $fillable = [
    'nama',
    'nama_ketua',
    'nomor_hp',
    'alamat',
    'kota_id',
  ];

  public function getAlamatLengkapAttribute($value){
    return "{$this->alamat} {$this->Kota->nama}, {$this->Kota->Provinsi->nama}";
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }

  public function getUUIDAttribute($value){
    return Crypter::encrypt($this->id);
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    return "{$this->alamat} {$this->Kota->nama_kota}, {$this->Kota->Provinsi->nama_provinsi}";
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }
}

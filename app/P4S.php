<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use HCrypt;

class P4S extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nama',
    'nama_ketua',
    'nomor_hp',
    'alamat',
    'kota_id',
  ];

  public function getAlamatLengkapAttribute($value){
    return "{$this->alamat}, {$this->Kota->nama}";
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }
}

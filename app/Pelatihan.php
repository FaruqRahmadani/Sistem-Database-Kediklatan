<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Pelatihan extends Model
{
  use SoftDeletes;

  protected $fillable = ['nama', 'tanggal', 'keterangan', 'tipe'];

  public function getTipeTextAttribute($value){
    $array = [
      'Penyuluh',
      'Kelompok Tani',
      'P4S'
    ];
    return $array[$this->tipe-1];
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }

  public function P4S(){
    return $this->belongsToMany('App\P4S', 'pelatihan_p4_s');
  }

  public function KelompokTani(){
    return $this->belongsToMany('App\KelompokTani', 'pelatihan_kelompok_tanis');
  }

  public function Penyuluh(){
    return $this->belongsToMany('App\Penyuluh', 'pelatihan_penyuluhs');
  }
}

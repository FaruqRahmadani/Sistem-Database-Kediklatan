<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypter;

class Pelatihan extends Model
{
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
    return Crypter::Encrypt($this->id);
  }
}

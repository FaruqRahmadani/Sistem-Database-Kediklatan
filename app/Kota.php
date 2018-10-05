<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Kota extends Model
{
  protected $hidden = [
    'created_at', 'updated_at',
  ];

  public function Komoditas(){
    return $this->belongsToMany('App\Komoditas', 'kota_komoditas');
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}

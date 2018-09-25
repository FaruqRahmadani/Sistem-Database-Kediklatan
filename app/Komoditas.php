<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Komoditas extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nama',
    'keterangan',
  ];

  public function Kota(){
    return $this->belongsToMany('App\Kota');
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}

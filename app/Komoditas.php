<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
  protected $fillable = [
    'nama',
    'keterangan',
  ];

  public function Kota(){
    return $this->belongsToMany('App\Kota');
  }
}

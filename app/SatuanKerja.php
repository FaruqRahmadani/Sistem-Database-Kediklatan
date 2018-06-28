<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatuanKerja extends Model
{
  public function Provinsi(){
    return $this->belongsTo('App\Provinsi');
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }

  public function Penyuluh(){
    return $this->hasMany('App\Penyuluh');
  }
}

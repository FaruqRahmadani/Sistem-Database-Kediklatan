<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyuluh extends Model
{
  public function SatuanKerja(){
    return $this->belongsTo('App\SatuanKerja');
  }

  public function UnitKerja(){
    return $this->belongsTo('App\UnitKerja');
  }
}

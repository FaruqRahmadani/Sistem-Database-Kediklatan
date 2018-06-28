<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
  public function Penyuluh(){
    return $this->hasMany('App\Penyuluh');
  }
}

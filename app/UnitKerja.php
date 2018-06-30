<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
  protected $fillable = [
    'nama',
    'alamat',
  ];

  public function Penyuluh(){
    return $this->hasMany('App\Penyuluh');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HCrypt;

class UnitKerja extends Model
{
  protected $fillable = [
    'nama',
    'alamat',
  ];

  public function Penyuluh(){
    return $this->hasMany('App\Penyuluh');
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}

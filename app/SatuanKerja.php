<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatuanKerja extends Model
{
  protected $fillable = [
    'nama',
    'alamat',
    'nomor_telepon',
    'provinsi_id',
    'kota_id',
  ];

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

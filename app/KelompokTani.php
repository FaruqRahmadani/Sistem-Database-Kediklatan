<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
  protected $fillable = [
    'nama',
    'nama_ketua',
    'nomor_hp',
    'alamat',
    'provinsi_id',
    'kota_id',
    'penyuluh_id',
    'foto',
  ];

  public function Komoditas(){
    return $this->belongsToMany('App\Komoditas');
  }

  public function Provinsi(){
    return $this->belongsTo('App\Provinsi');
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }

  public function Penyuluh(){
    return $this->belongsTo('App\Penyuluh');
  }
}

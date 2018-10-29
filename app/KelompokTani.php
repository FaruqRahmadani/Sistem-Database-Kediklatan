<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use HCrypt;

class KelompokTani extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nama',
    'nama_ketua',
    'nomor_hp',
    'alamat',
    'kota_id',
    'penyuluh_id',
  ];

  public function Komoditas(){
    return $this->belongsToMany('App\Komoditas')->withTrashed();
  }

  public function Provinsi(){
    return $this->belongsTo('App\Provinsi');
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }

  public function Penyuluh(){
    return $this->belongsTo('App\Penyuluh')->withTrashed();
  }

  public function Pelatihan(){
    return $this->belongsToMany('App\Pelatihan', 'pelatihan_kelompok_tanis');
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}

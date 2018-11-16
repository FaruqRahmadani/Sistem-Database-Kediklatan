<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use HCrypt;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = [
    'username', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function setPasswordAttribute($value){
    if ($value) $this->attributes['password'] = bcrypt($value);
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }

  public function getTipeTextAttribute(){
    switch ($this->tipe) {
      case 5:
        return "Admin";
        break;
      case 1:
        return "Penyuluh";
        break;
      case 2:
        return "Kelompok Tani";
        break;
      case 3:
        return "P4S";
        break;
      default:
        return "Kode Tidak Diketahui";
        break;
    }
  }

  public function Data(){
    if ($this->tipe == 5) return $this->hasOne('App\Admin');
    if ($this->tipe == 1) return $this->hasOne('App\Penyuluh');
    if ($this->tipe == 2) return $this->hasOne('App\KelompokTani');
    if ($this->tipe == 3) return $this->hasOne('App\P4S');
  }
}

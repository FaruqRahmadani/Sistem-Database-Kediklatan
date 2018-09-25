<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use HCrypt;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = [
    'nama', 'username', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function setPasswordAttribute($value){
    if ($value) {
      $this->attributes['password'] = bcrypt($value);
    }
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}

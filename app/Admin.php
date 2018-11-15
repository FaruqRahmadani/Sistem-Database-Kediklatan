<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Admin extends Model
{
  protected $fillable = ['nama', 'user_id'];

  public function User(){
    return $this->belongsTo('App\User');
  }

  public function getUUIDAttribute(){
    return HCrypt::Encrypt($this->id);
  }
}

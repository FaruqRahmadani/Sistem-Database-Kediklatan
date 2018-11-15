<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  protected $fillable = ['nama', 'foto', 'user_id'];

  public function User(){
    return $this->belongsTo('App\User');
  }

  public function getUUIDAttribute(){
    return encrypt($this->id);
  }
}

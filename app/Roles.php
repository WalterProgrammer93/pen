<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\User;
use pen\Perfil;

class Roles extends Model
{
  protected $primaryKey = 'id';
  protected $fillable = ['usuario', 'perfil'];

  public function users() {
    return $this->belongsTo(User::class);
  }

  public function perfils() {
    return $this->belongsTo(Perfil::class);
  }
}

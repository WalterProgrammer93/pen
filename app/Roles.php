<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\User;
use pen\Perfil;

class Roles extends Model
{
  protected $table = 'perfil_user';
  protected $primaryKey = 'id';
  protected $fillable = ['usuario', 'perfil'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function perfil() {
    return $this->belongsTo(Perfil::class);
  }
}

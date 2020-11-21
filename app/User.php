<?php

namespace pen;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use pen\Perfil;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primeryKey = 'id';
    protected $fillable = [
        'nombre','email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function perfils() {
      return $this->belongsToMany(Perfil::class)->withTimestamps();;
    }

    public function authorizeRoles($roles) {
      if ($this->hasAnyRole($roles)) {
        return true;
      }
      abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles) {
      if (is_array($roles)) {
          foreach ($roles as $role) {
              if ($this->hasRole($role)) {
                  return true;
              }
          }
      } else {
          if ($this->hasRole($roles)) {
               return true;
          }
      }
      return false;
    }

    public function hasRole($role) {
      if ($this->perfils()->where('perfil', $role)->first()) {
          return true;
      }
      return false;
    }

}

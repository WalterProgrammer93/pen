<?php

namespace pen;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Perfil;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primeryKey = 'user_id';
    protected $fillable = [
        'nombre','email','password','perfil_id'
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
      return $this->belongsTo(Perfil::class);
    }

    public function administrador() {

        if ($this->perfil->rol == 'Administrador') {

            return true;
        }

        return false;
    }

    public function estudiante() {

        if ($this->perfil->rol == 'Estudiante') {
            return true;
        }

        return false;
    }

    public function Profesor() {

        if ($this->perfil->rol == 'Profesor') {

            return true;
        }

        return false;
    }

    public function Invitado() {

        if ($this->perfil->rol == 'Invitado') {

            return true;
        }

        return false;
    }
}

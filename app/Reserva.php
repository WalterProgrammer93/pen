<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Profesor;
use pen\Evento;

class Reserva extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','profesor','evento','descripcion','reservado'];

    public function profesor() {
    	return $this->hasMany(Profesor::class, 'id');
    }

    public function evento() {
    	return $this->hasMany(Evento::class, 'id');
    }
}

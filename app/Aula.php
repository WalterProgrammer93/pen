<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Asignaturas;
use pen\Eventos;
use pen\Reserva;

class Aula extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['etiqueta','descripcion', 'disponibilidad'];

    public function asignatura() {
    	return $this->hasMany(Asignaturas::class);
    }

    public function eventos() {
    	return $this->hasMany(Evento::class);
    }

    public function reserva() {
      return $this->hasMany(Reserva::class);
    }
}

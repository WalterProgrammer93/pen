<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Asignaturas;
use pen\Eventos;

class Aula extends Model
{
    protected $primaryKey = 'aula_id';
    protected $fillable = ['etiqueta','descripcion', 'disponibilidad'];

    public function asignatura() {
    	return $this->hasMany(Asignaturas::class);
    }

    public function eventos() {
    	return $this->hasMany(Evento::class);
    }
}

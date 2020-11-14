<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Asignaturas;
use pen\Eventos;

class Aula extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','etiqueta','descripcion', 'disponibilidad'];

    public function asignatura() {
    	return $this->hasMany(Asignaturas::class, 'id');
    }

    public function eventos() {
    	return $this->hasMany(Evento::class, 'id');
    }
}

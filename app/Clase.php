<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Asignatura;
use pen\Profesor;

class Clase extends Model
{
    protected $primaryKey = 'clase_id';
    protected $fillable = ['asignatura','profesor', 'horario'];

    public function asignatura() {
    	return $this->hasMany(Asignaturas::class);
    }

    public function profesor() {
    	return $this->hasMany(Evento::class);
    }
}

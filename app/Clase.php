<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Asignatura;
use pen\Profesor;

class Clase extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','asignatura','profesor', 'horario'];

    public function asignatura() {
    	return $this->hasMany(Asignaturas::class, 'id');
    }

    public function profesor() {
    	return $this->hasMany(Evento::class, 'id');
    }
}

<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Alumno;
use pen\Asignatura;

class Curso extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','nombre','descripcion'];

    public function alumnos() {
    	return $this->hasMany(Alumno::class, 'id');
    }

    public function asignaturas() {
    	return $this->hasMany(Asignatura::class, 'id');
    }
}

<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Alumno;
use pen\Asignatura;

class Asistencia extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','numero_horas','curso','asignatura'];

    public function alumno() {
    	return $this->hasMany(Alumno::class, 'id');
    }

    public function asignatura() {
    	return $this->hasMany(Asignatura::class, 'id');
    }
}

<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Curso;
use pen\Aula;
use pen\Tarea;
use pen\Asistencia;

class Asignatura extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion', 'curso', 'aula'];

    public function curso() {
    	return $this->belongsTo(Curso::class);
    }

    public function aula() {
    	return $this->belongsTo(Aula::class);
    }

    public function tarea() {
    	return $this->hasMany(Tarea::class);
    }

    public function asistencia() {
      return $this->hasMany(Asistencia::class);
    }
}

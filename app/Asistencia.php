<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Alumno;
use pen\Asignatura;

class Asistencia extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['numero_horas','curso','asignatura'];

    public function alumno() {
    	return $this->belongsTo(Alumno::class);
    }

    public function asignatura() {
    	return $this->belongsTo(Asignatura::class);
    }
}

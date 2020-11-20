<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Alumno;
use pen\Asignatura;

class Convalidacion extends Model
{
    protected $primaryKey = 'convalidacion_id';
    protected $fillable = ['alumno','asignatura'];

    public function alumno() {
    	return $this->hasMany(Alumno::class);
    }

    public function asignatura() {
    	return $this->hasMany(Asignatura::class);
    }
}

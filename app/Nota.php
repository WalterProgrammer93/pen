<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Alumno;
use pen\Asignatura;

class Nota extends Model
{
    protected $primaryKey = 'nota_id';
    protected $fillable = ['eva1','eva2','eva3','media','alumno','asignatura'];

    public function alumno() {
    	return $this->hasMany(Alumno::class);
    }

    public function asignatura() {
    	return $this->hasMany(Asignatura::class);
    }
}

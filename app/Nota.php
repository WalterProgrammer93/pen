<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Alumno;
use pen\Asignatura;

class Nota extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['eva1','eva2','eva3','media','alumno','asignatura'];

    public function alumno() {
    	return $this->belongsTo(Alumno::class);
    }

    public function asignatura() {
    	return $this->belongsTo(Asignatura::class);
    }
}

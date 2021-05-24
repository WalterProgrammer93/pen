<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Asignatura;
use pen\Profesor;

class Clase extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['asignatura','profesor', 'horario'];

    public function asignatura() {
    	return $this->belongsTo(Asignatura::class);
    }

    public function profesor() {
    	return $this->belongsTo(Profesor::class);
    }
}

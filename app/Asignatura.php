<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Curso;
use pen\Aula;

class Asignatura extends Model
{
    protected $primaryKey = 'asignatura_id';
    protected $fillable = ['nombre','descripcion', 'curso', 'aula'];

    public function curso() {
    	return $this->belongsTo(Curso::class);
    }

    public function aula() {
    	return $this->belongsTo(Aula::class);
    }
}

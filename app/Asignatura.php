<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Curso;
use pen\Aula;

class Asignatura extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','nombre','descripcion', 'curso', 'aula'];

    public function curso() {
    	return $this->hasOne(Curso::class, 'id');
    }

    public function aula() {
    	return $this->hasOne(Aula::class, 'id');
    }
}

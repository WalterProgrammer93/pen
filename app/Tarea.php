<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Tema;
use pen\Asignatura;

class Tarea extends Model
{
    protected $primaryKey = 'tarea_id';
    protected $fillable = ['codigo','titulo','descripcion','autor','fecha_envio','fecha_entrega','hora_entrega','calificacion','asignatura','tema'];

    public function asignatura() {
    	return $this->hasMany(Asignatura::class);
    }
    public function tema() {
    	return $this->hasMany(Tema::class);
    }
}

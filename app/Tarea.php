<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Tema;
use pen\Asignatura;

class Tarea extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['titulo','descripcion','autor','fecha_envio','fecha_entrega','hora_entrega','calificacion','asignatura','tema'];

    public function asignatura() {
    	return $this->belongsTo(Asignatura::class);
    }
    public function tema() {
    	return $this->belongsTo(Tema::class);
    }
}

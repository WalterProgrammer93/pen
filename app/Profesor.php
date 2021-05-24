<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Departamento;
use pen\Reserva;
use pen\Clase;

class Profesor extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'apellido1', 'apellido2','dni','email','telefono','disponibilidad','departamento'];

    public function departamento() {
    	 return $this->belongsTo(Departamento::class);
    }

    public function reserva() {
        return $this->hasMany(Reserva::class);
    }

    public function clase() {
      return $this->hasMany(Clase::class);
    }
}

<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\departamento;

class Profesor extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'apellido1', 'apellido2','dni','email','telefono','disponibilidad','departamento'];

    public function departamento() {
    	return $this->belongsTo(Departamento::class);
    }
}

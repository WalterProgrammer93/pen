<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Curso;
use pen\Asistencia;

class Alumno extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = ['nombre','apellido1','apellido2','dni','fecha_nacimiento',
		'telefono','correo','sexo','ciudad','provincia','nacionalidad','codigo_postal',
		'direccion','portal','piso','letra','repite','foto','curso_id'];

		public function curso() {
			return $this->belongsTo(Curso::class, 'id');
		}

}

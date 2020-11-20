<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Profesor;

class Departamento extends Model
{
    protected $primaryKey = 'departamento_id';
    protected $fillable = ['nombre','descripcion','estado'];

    public function profesor() {
    	return $this->hasMany(Profesor::class);
    }
}

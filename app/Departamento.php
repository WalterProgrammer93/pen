<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Profesor;

class Departamento extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion','estado'];

    public function profesor() {
    	return $this->hasMany(Profesor::class);
    }
}

<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Tarea;

class Tema extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'titulo', 'documento_tema'];

    public function tarea() {
    	return $this->hasMany(Tarea::class);
    }
}

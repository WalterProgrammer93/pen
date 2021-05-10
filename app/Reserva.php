<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Profesor;
use pen\Evento;
use pen\Aula;

class Reserva extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['profesor','evento','aula','descripcion','reservado'];

    public function profesor() {
    	return $this->belongsTo(Profesor::class);
    }

    public function evento() {
    	return $this->belongsTo(Evento::class);
    }

    public function aula() {
      return $this->belongsTo(Aula::class);
    }
}

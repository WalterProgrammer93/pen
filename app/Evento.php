<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Aula;
use pen\Reserva;

class Evento extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion','disponibilidad','aula'];

    public function aula() {
      return $this->belongsTo(Aula::class);
    }

    public function reserva() {
      return $this->belongsTo(Reserva::class);
    }
}

<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\Aula;

class Evento extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion','disponibilidad','aula'];

    public function aula() {
      return $this->belongsTo(Aula::class);
    }
}

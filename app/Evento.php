<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $primaryKey = 'evento_id';
    protected $fillable = ['nombre','descripcion'];

}

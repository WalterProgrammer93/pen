<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','nombre','descripcion'];

}

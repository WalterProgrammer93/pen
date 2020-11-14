<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $primaryKey = 'id';
	protected $fillable = ['codigo', 'rol'];

}

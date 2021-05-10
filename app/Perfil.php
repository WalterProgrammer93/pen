<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\User;
use pen\Roles;

class Perfil extends Model
{
	protected $primaryKey = 'id';
	protected $fillable = ['nombre', 'descripcion'];

	public function users() {
		return $this->belongsToMany(User::class)->withTimestamps();;
	}

	public function roles() {
		return $this->hasMany(Roles::class);
	}
}

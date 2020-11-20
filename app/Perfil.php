<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Perfil extends Model
{
	protected $primaryKey = 'perfil_id';
	protected $fillable = ['rol'];

	public function users() {
		return $this->hasMany(User::class, 'user_id');
	}

}

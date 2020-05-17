<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto_profils extends Model
{
    protected $fillable = ['users_id', 'foto_profil'];

	public function User()
	{
		return $this->belongsTo('App\User');
	}
}

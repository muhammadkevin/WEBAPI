<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
	use SoftDeletes;

	protected $table = "kategori";
	protected $dates = ['deleted_at'];
    protected $fillable = ['kategori', 'deskripsi'];

    public function Artikel()
    {
    	return $this->hasMany('App\artikel');
    }
}

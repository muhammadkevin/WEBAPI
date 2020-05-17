<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentm extends Model
{
    protected $table = 'commentm';
    protected $fillable = ['artikel_id'];

    public function Artikel()
    {
    	return $this->belongsTo('App\artikel');
    }

    public function Commentd()
    {
    	return $this->hasMany('App\commentd');
    }

}

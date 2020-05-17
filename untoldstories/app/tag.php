<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class tag extends Model
{

	use SoftDeletes;

    protected $table = "tag";
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_tag'];

    public function Artikel()
    {
    	return $this->belongsToMany('App\artikel');
    }
    
    public function Artikel_Tag()
    {
        return $this->hasMany('App\artikel_tag');    
    }
    
}

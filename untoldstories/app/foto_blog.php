<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class foto_blog extends Model
{
    use SoftDeletes;

    protected $table = 'foto_blog';
    protected $dates = ['deleted_at'];
    protected $fillable = ['artikel_id', 'foto'];

    public function Artikel()
    {
    	return $this->belongsTo('App\artikel');
    } 

}

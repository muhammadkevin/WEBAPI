<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class artikel extends Model
{
    use SoftDeletes;

    protected $table = 'artikel';
    protected $dates = ['deleted_at'];
    protected $fillable = ['kategori_id','judul','isi','tanggal'];

    public function Kategori()
    {
    	return $this->belongsTo('App\kategori');
    }

    public function FotoBlog()
    {
    	return $this->hasMany('App\foto_blog');
    }

    public function Commentm()
    {
    	return $this->hasMany('App\Commentm');
    }
    public function Tag()
    {
        return $this->belongsToMany('App\tag');
    }
    public function Artikel_Tag()
    {
        return $this->hasMany('App\artikel_tag');
    }


}

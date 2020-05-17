<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class artikel_tag extends Model
{    
    protected $table = 'artikel_tag';
     protected $dates = ['deleted_at'];
    protected $fillable = ['artikel_id', 'tag_id'];

    public function Artikel()
    {
        return $this->belongsTo('App\artikel');
    }
    
    public function Tag()
    {
        return $this->belongsTo('App\tag');    
    }
    
}

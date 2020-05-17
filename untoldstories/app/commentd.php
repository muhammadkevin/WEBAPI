<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentd extends Model
{
    protected $table = 'commentd';
    protected $fillable = ['commentm_id', 'isi', 'nama', 'email'];

    public function Commentm()
    {
    	return $this->belongsTo('App\commentm');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    public $timestamps = false;

    protected $fillable=['name','precio','descripcion','categoria_id'];
    
   	public function categoria(){
    	return $this->belongsTo('App\Phone');
	}
}

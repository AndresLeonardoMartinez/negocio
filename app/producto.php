<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    public $timestamps = false;
    
   	public function categoria(){
    	return $this->belongsTo('App\Phone');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    public $timestamps = false;
    protected $fillable =['name','descripcion','imagen'];

    public function productos(){
    	return $this->hasMany('App\producto');
    }
}

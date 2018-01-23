<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class producto extends Model
{

    protected $fillable=['name','precio','descripcion','categoria_id','imagen','stock','nuevo'];
    
   	public function categoria(){
        return $this->belongsTo('App\categoria','categoria_id');
	}
	public function esNuevo(){
		
		$end = Carbon::parse($this->create_at);
		$now = Carbon::now();
		$length = $end->diffInDays($now);
		
		return ($length<=30);
	}
}

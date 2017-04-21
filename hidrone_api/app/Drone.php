<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    protected $fillable = ['id_Drone', 'Model', 'Marca', 'Minuts_vol', 'FK_Usuari'];
    public function usuaris() {
		return $this->belongsTo('App\Usuari'); 
	}
	 public function vols() {
		return $this->hasMany('App\Vol'); 
	}
}
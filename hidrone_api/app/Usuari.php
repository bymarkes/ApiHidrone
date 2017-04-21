<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    protected $fillable = ['id', 'Nom', 'Cognom', 'Correu', 'Nick', 'Contrasenya', 'Alta_usuari', 'n_drones', 'n_vols'];

    public function drones() {
		return $this->hasMany('App\Drone'); 
	}
	public function imatges() {
		return $this->hasMany('App\Imatge'); 
	}
	public function missatges() {
		return $this->hasMany('App\Missatge'); 
	}
}

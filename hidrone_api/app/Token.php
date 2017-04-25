<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
     protected $fillable = ['id', 'token', 'usuari_id', 'updated_at', 'created_at'];
     
    public function usuaris() {
		return $this->hasMany('App\Usuari'); 
	}
}

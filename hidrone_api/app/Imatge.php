<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imatge extends Model
{
    protected $fillable = ['id', 'url', 'usuari_id','updated_at','created_at'];

     public function usuaris() {
		return $this->belongsTo('App\Usuari'); 
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Missatge extends Model
{
    protected $fillable = ['id', 'date_Missatge', 'text_Missatge', 'usuari_id', 'vol_id'];

    public function usuaris() {
		return $this->belongsTo('App\Usuari'); 
	}
}

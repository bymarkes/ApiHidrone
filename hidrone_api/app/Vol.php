<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $fillable = ['id', 'Distancia', 'Temps', 'Vel_mitjana', 'Alt_maxima', 'Data_vol', 'Total_likes', 'drone_id','updated_at','created_at'];
    public function drones() {
		return $this->belongsTo('App\Drone'); 
	}
}

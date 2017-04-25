<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineFlight extends Model
{
    protected $fillable = ['id', 'Lat', 'Lon', 'usuari_id','created_at','updated_at'];
}

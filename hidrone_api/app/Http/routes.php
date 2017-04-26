<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api/usuaris', 'UsuarisController', ['except'=>['create','edit']]);

Route::resource('api/usuaris.drones', 'DronesController', ['except'=>['create','edit']]);

Route::resource('api/usuaris.drones.vol', 'VolsController', ['except'=>['create','edit','update']]);

Route::resource('api/usuaris.imatges','ImatgesController', ['except'=>['create','edit']]);

Route::resource('api/usuaris.missatges','MissatgesController', ['except'=>['create','edit']]);

Route::resource('api/onlineflights', 'OnlineFlightsController', ['except'=>['create','edit']]);

Route::resource('api/login', 'LoginController', ['only'=>['store','destroy']]);

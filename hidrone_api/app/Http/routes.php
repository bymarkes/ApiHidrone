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

Route::resource('api/usuaris',
'UsuarisController');

Route::resource('api/usuaris.drones',
'DronesController');

Route::resource('api/usuaris.drones.vol',
'VolsController');

Route::resource('api/usuaris.imatges',
'ImatgesController');

Route::resource('api/usuaris.missatges',
'MissatgesController');

Route::resource('api/onlineflights',
'OnlineFlightsController');

Route::resource('api/login',
'LoginController');

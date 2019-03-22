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

Route::resource('sitios/provincias','ProvinciaController');
Route::resource('sitios/cantones','CantonController');
Route::resource('sitios/parroquias','ParroquiaController');
Route::resource('sitios/recintos','RecintoController');
Route::resource('sitios/juntas','JuntaController');
Route::resource('personas/dignidades','DignidadController');
Route::resource('personas/candidatos','CandidatoController');
Route::resource('votos/votosjuntas','VotosJuntaController');
Route::get('votos/votosjuntas/{id}','VotosJuntaController@show');

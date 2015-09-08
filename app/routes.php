<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('admin/layout2');
});

Route::get('torneo', function()
{
	return View::make('torneo');
});

Route::get('reglamento', function()
{
	return View::make('reglamento');
});

Route::get('posicionesMas', function()
{
	return View::make('posicionesMasculino');
});

Route::get('goleadoresMas', function()
{
	return View::make('goleadoresMasculino');
});

Route::get('torneos', array('uses' => 'TorneosController@mostrarTorneos'));

Route::post('torneos', array('uses' => 'TorneosController@crearTorneo'));

Route::get('gestionTorneo/{id}', array('uses' => 'TorneosController@gestionarTorneo'));


Route::get('equipo', 'EquiposController@mostrarEquipos');

Route::post('equipo', 'EquiposController@crearEquipo');


Route::get('admin', function()
{
	return View::make('admin');
});

 Route::resource('partidos', 'PartidoController');

 Route::resource('fechas', 'FechaController');

Route::get('posiciones', array('uses' => 'TorneosController@mostrarPosiciones'));

/*Nuevas*/

Route::resource('admin/torneo', 'Torneo1Controller');

Route::resource('admin/partido', 'Partido1Controller');

Route::resource('admin/equipo', 'EquipoController');

Route::resource('admin/fecha', 'FechaController');

//Route::get('admin.partido.crearPartido', array('uses' => 'Partido1Controller@crearPartido'));

Route::get('admin/partido/crearPartido/{id}/{torneo}', array('as'=>'hola','uses'=>'Partido1Controller@crearPartido'));
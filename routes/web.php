<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Dashboard
// Route::get('admin', 'HomeController@index')->name('admin');

Route::resource('usuarios', 'UsersController');
Route::resource('expedientes', 'ExpedienteController');
Route::resource('pendientes', 'PendientesController')->only(['index', 'destroy']);

Route::resource('materias', 'MateriaController')->only(['create', 'store']);
Route::resource('juzgados', 'JuzgadoController')->only(['create', 'store']);
Route::resource('procesos', 'ProcesoController')->only(['create', 'store']);

Route::get('/search', 'ExpedienteController@search')->name('expedientes.search');
Route::get('/buscarp', 'PendientesController@buscarp')->name('expedientes.buscarp');
Route::get('casos-por-vencer', 'PendientesController@welcome')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

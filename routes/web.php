<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::resource('/', 'App\Http\Controllers\PersonaController');

Route::resource('/', 'App\Http\Controllers\IndexController');

Route::resource('vehiculo', 'App\Http\Controllers\VehiculoController');
Route::resource('propietario', 'App\Http\Controllers\PropietarioController');
Route::resource('conductor', 'App\Http\Controllers\ConductorController');

//Route::get('/', 'App\Http\Controllers\IndexController@index');

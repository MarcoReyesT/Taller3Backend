<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware' => ['cors']], function () {

	Route::resource('generos', 'GeneroController', [
	    'only' => ['index', 'show']
	]);
	Route::resource('autores', 'AutorController', [
	    'only' => ['index', 'show']
	]);
	Route::resource('estados', 'EstadoController', [
	    'only' => ['index', 'show']
	]);
	
	Route::resource('ejemplares', 'EjemplarController');
	Route::resource('libros', 'LibroController');
	Route::resource('usuarios', 'UsuarioController');

});
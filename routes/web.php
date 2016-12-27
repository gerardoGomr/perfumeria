<?php

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

Route::group(['middleware' => ['usuarioAutenticado']], function () {
    Route::get('/', function () {
        return view('index');
    });
});

// ruta para mostrar vista de login
Route::get('login', function () {
    return view('login');
});

// ruta para procesar login
Route::post('login', 'Login\LoginController@login');

// ruta para procesar logout
Route::get('logout', 'Login\LoginController@logout');
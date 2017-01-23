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
    // ruta para mostrar pantalla principal
    Route::get('/', 'Inventarios\InventariosController@index');

    // ruta para mostrar vista de listado de productos
    Route::get('productos', 'Productos\ProductosController@index');

    // ruta para mostrar vista de captura de nuevo producto
    Route::get('productos/nuevo', 'Productos\ProductosController@crear');

    // ruta para crear nuevo producto
    Route::post('productos/nuevo', 'Productos\ProductosController@guardar');

    // ruta para mostrar vista de captura de inventario
    Route::get('inventario/nuevo', 'Inventarios\InventariosController@crear');
});

// ruta para mostrar vista de login
Route::get('login', function () {
    return view('login');
});

// ruta para procesar login
Route::post('login', 'Login\LoginController@login');

// ruta para procesar logout
Route::get('logout', 'Login\LoginController@logout');
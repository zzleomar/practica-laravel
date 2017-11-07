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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','middleware' => ['CheckRoleAdmin']],function(){
	Route::get('/','ControladorSesion@index');

	//RUTAS ADMIN-USUARIOS
	Route::get('/usuarios','ControladorUsuarios@index');
	Route::get('/usuarios/create','ControladorUsuarios@create');
	Route::post('/usuarios','ControladorUsuarios@store');
	Route::get('/usuarios/edit/{id}','ControladorUsuarios@edit');
	Route::get('/usuarios/edit-ajax/{id}','ControladorUsuarios@editAjax');
	Route::post('/usuarios/update/{id}','ControladorUsuarios@update');
	Route::get('/usuarios/destroy/{id}','ControladorUsuarios@destroy');
	Route::get('/usuarios/destroy-ajax/{id}','ControladorUsuarios@destroyAjax');

		//RUTAS ADMIN-CATEGORIAS
	Route::get('/categorias','ControladorCategorias@index');
	Route::get('/categorias/create','ControladorCategorias@create');
	Route::post('/categorias','ControladorCategorias@store');
	Route::get('/categorias/edit/{id}','ControladorCategorias@edit');
	Route::post('/categorias/update/{id}','ControladorCategorias@update');
	Route::get('/categorias/destroy/{id}','ControladorCategorias@destroy');

		//RUTAS ADMIN-ARTICULOS
	Route::get('/articulos','ControladorArticulos@index');
	Route::get('/articulos/create','ControladorArticulos@create');
	Route::post('/articulos','ControladorArticulos@store');
	Route::get('/articulos/edit/{id}','ControladorArticulos@edit');
	Route::post('/articulos/update/{id}','ControladorArticulos@update');
	Route::get('/articulos/destroy/{id}','ControladorArticulos@destroy');

	
		//RUTAS ADMIN-TAGS
	Route::get('/tags','ControladorTags@index');
	Route::get('/tags/create','ControladorTags@create');
	Route::post('/tags','ControladorTags@store');
	Route::get('/tags/edit/{id}','ControladorTags@edit');
	Route::post('/tags/update/{id}','ControladorTags@update');
	Route::get('/tags/destroy/{id}','ControladorTags@destroy');
	
});

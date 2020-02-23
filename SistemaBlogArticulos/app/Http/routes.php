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
    return view('auth/loginMejorado');
});

Route::auth();

Route::resource('blogArticulo/articulo', 'ArticuloController');
Route::resource('blogArticulo/principal', 'PrincipalController');

Route::get('/home', 'HomeController@index');

Route::get('blogArticulo/articulo/restore/{id}', 'ArticuloController@restore');

Route::get('blogArticulo/principal/buscarTipo/{id}', 'PrincipalController@buscarTipo');

Route::resource('blogArticulo/principal/guardarComentario', 'PrincipalController@guardarComentario');


Route::get('blogArticulo/principal/buscarTipo', function () {
    return view('blogArticulo/principal/buscarTipo');
});

Route::get('blogArticulo/principal/invitado', function () {
    return view('blogArticulo/principal/invitado');
});

Route::resource('blogArticulo/usuario', 'UsuarioController');
Route::resource('blogArticulo/verPerfil', 'UsuarioController@verPerfil');
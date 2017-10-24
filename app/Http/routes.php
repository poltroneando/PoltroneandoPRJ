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

Route::auth();
Route::group(['prefix'=>'/perfil'],function(){
    Route::get('/',['middleware'=>'auth','uses'=>'PerfilController@profile']);    
    Route::post('/', 'PerfilController@update_avatar');
    Route::get('/editar', ['middleware' => 'auth', 'uses'=>'PerfilController@editar']);
    Route::get('/{uuid}',function($uuid){
        dd($uuid);
    });
});

Route::get('/cadastrar', function() {
	return view('auth/login',['tipo'=>'1']);
});

Route::get('/cadastrar', function() {	
	return view('auth/login',['tipo'=>'1']);
});

Route::get('/login', function() {
	return view('auth/login',['tipo'=>'0']);
});

Route::get('/login/facebook', 'Auth\AuthController@loginFacebook');
Route::get('/login/facebook/callback', 'Auth\AuthController@facebookCallback');
Route::get('/login/google', 'Auth\AuthController@loginGoogle');
Route::get('/login/google/callback', 'Auth\AuthController@googleCallback');

Route::get('/home', 'HomeController@index');


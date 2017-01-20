<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route Menu Alumni
Route::get('/admin/alumni', 'AdminController@index_alumni');
Route::get('/admin/alumni/tambah', 'AdminController@tambah_alumni');
Route::post('/admin/alumni/save', 'AdminController@simpan_alumni');
Route::get('/admin/alumni/update/{id}', 'AdminController@update_alumni');
Route::post('/admin/alumni/delete', 'AdminController@hapus_alumni');
Route::get('/admin/alumni/view/{id}', 'AdminController@view_alumni');


/* Module Alumni */
Route::get('/login-alumni', 'AlumniController@login');
Route::post('/login-alumni', 'Auth\LoginController@login_alumni');
Route::get('/reg-alumni', 'AlumniController@register');

Route::post('/alumni/save_register', 'AlumniController@simpan_alumni');



Route::group(['middleware' => ['tracer']], function () {
    //Login Routes...
    Route::get('/alumni/home', 'AlumniController@index');
	//Menu Tracer
    Route::get('/alumni/tracer', 'AlumniController@index_tracer');
});

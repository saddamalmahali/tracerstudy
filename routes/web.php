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



//Route Menu Alumni



/* Module Alumni */
Route::get('/login-alumni', 'AlumniController@login');
Route::post('/login-alumni', 'Auth\LoginController@login_alumni');
Route::post('/masuk-alumni', 'Auth\LoginController@masuk_alumni');
Route::get('/reg-alumni', 'AlumniController@register');
Route::get('/daftar-alumni', 'AlumniController@daftar_alumni');
Route::get('/tentang', 'AlumniController@tentang_situs');
Route::get('/kontak', 'AlumniController@kontak_situs');

Route::post('/alumni/save_register', 'AlumniController@simpan_alumni');

Route::group(['middleware'=>['web']], function(){

    //Dasboard Admin
    Route::get('/home', 'HomeController@index');
    Route::post('/get_data_chart', 'HomeController@get_data_chart');

    //Menu Alumni
    Route::get('/admin/alumni', 'AdminController@index_alumni');
    Route::get('/admin/alumni/tambah', 'AdminController@tambah_alumni');
    Route::post('/admin/alumni/save', 'AdminController@simpan_alumni');
    Route::get('/admin/alumni/update/{id}', 'AdminController@update_alumni');
    Route::post('/admin/alumni/delete', 'AdminController@hapus_alumni');
    Route::get('/admin/alumni/view/{id}', 'AdminController@view_alumni');
    
    //Menu Admin
    Route::get('/admin/user_admin', 'AdminController@index_user_admin');
    Route::get('/admin/user_admin/tambah', 'AdminController@tambah_user_admin');
    Route::post('/admin/user_admin/save', 'AdminController@save_user_admin');
    Route::post('/admin/user_admin/save_update', 'AdminController@save_update_user_admin');
    Route::get('/admin/user_admin/update/{id}', 'AdminController@update_user_admin');
    Route::post('/admin/user_admin/delete', 'AdminController@hapus_user_admin');

    Route::group(['prefix'=>'admin/tracer'], function(){
        Route::get('/', 'AdminTracerController@index');
        Route::get('/view/{id_tracer}', 'AdminTracerController@view_tracer');
    });
});

Route::group(['middleware' => ['tracer']], function () {
    //Login Routes...
    Route::get('/alumni/home', 'AlumniController@index');
	//Menu Tracer
    Route::get('/alumni/tracer', 'AlumniController@index_tracer');

    //Submit Form Quesioner
    Route::post('/alumni/submit_form_tracer', 'AlumniController@input_tracer');
});

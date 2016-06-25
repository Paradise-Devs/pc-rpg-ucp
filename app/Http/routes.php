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

Route::auth();

Route::get('/denuncia/create/admin', 'ReportsController@create_admin');

Route::get('/faq/gerenciar', 'FrequentlyAskedController@manage');
Route::get('/faq/editar/{id}', 'FrequentlyAskedController@edit');

Route::resource('faq', 'FrequentlyAskedController', ['except' => ['show']]);
Route::resource('denuncia', 'ReportsController', ['except' => ['show', 'index']]);

Route::get('/punicoes', 'PunishmentsController@index');
Route::get('/denuncias', 'ReportsController@index');
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

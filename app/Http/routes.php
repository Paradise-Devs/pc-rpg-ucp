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


Route::post('/perfil/save/info', 'ProfileController@info');
Route::post('/perfil/save/avatar', 'ProfileController@avatar');
Route::post('/perfil/save/email', 'ProfileController@email');

Route::post('/customlogin', 'CustomAuthController@login');

Route::post('/denuncia/deny/{id}', 'ReportsController@deny');
Route::get('/denuncia/create/admin', 'ReportsController@create_admin');
Route::get('/denuncia/admin/{id}', 'ReportsController@show_admin');
Route::get('/denuncias/gerenciar', 'ReportsController@manage');

Route::get('/faq/gerenciar', 'FrequentlyAskedController@manage');
Route::get('/faq/editar/{id}', 'FrequentlyAskedController@edit');

Route::get('/perfil/configuracoes', 'ProfileController@config');
Route::get('/perfil/{id}', 'UserController@show');

Route::resource('message', 'MessageController', ['only' => ['index']]);

Route::resource('faq', 'FrequentlyAskedController', ['except' => ['show']]);
Route::resource('denuncia', 'ReportsController');

Route::get('ticket/manage', 'TicketController@manage');
Route::post('ticket/open/{id}', 'TicketController@open');
Route::post('ticket/close/{id}', 'TicketController@close');
Route::post('ticket/answer/{id}', 'TicketController@answer');
Route::resource('ticket', 'TicketController');

Route::get('/punicoes', 'PunishmentsController@index');
Route::get('/denuncias', 'ReportsController@index');
Route::get('/ranking', 'HomeController@ranking');
Route::get('/jogadores', 'HomeController@players');
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

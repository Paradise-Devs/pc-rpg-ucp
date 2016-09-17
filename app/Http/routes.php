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

Route::post('bugs/comment/{id}', 'BugController@comment');
Route::post('bugs/affect/{id}', 'BugController@affect');
Route::post('bugs/status/{id}', 'BugController@update_stat');
Route::resource('bugs', 'BugController');

Route::post('blueprints/comment/{id}', 'BlueprintController@comment');
Route::get('blueprints/upvote/{id}', 'BlueprintController@upvote');
Route::get('blueprints/downvote/{id}', 'BlueprintController@downvote');
Route::post('blueprints/status/{id}', 'BlueprintController@update_stat');
Route::resource('blueprints', 'BlueprintController');

Route::get('/perfil/amizade/enviar/{id}', 'ProfileController@addFriend');
Route::get('/perfil/amizade/recusar/{id}', 'ProfileController@denyFriend');
Route::get('/perfil/amizade/aceitar/{id}', 'ProfileController@acceptFriend');
Route::get('/perfil/amizade/desfazer/{id}', 'ProfileController@removeFriend');

Route::get('/perfil/amigos/{id}', 'ProfileController@friendslist');

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

Route::get('/message/lixeira', 'MessageController@trash');
Route::get('/message/outbox', 'MessageController@outbox');
Route::resource('message', 'MessageController', ['only' => ['index', 'store', 'show']]);

Route::resource('faq', 'FrequentlyAskedController', ['except' => ['show']]);
Route::resource('denuncia', 'ReportsController');

Route::get('ticket/manage', 'TicketController@manage');
Route::post('ticket/open/{id}', 'TicketController@open');
Route::post('ticket/close/{id}', 'TicketController@close');
Route::post('ticket/answer/{id}', 'TicketController@answer');
Route::resource('ticket', 'TicketController');

Route::get('/punicoes', 'PunishmentsController@index');
Route::get('/denuncias', 'ReportsController@index');
Route::get('/ranking', 'UCPController@ranking');
Route::get('/jogadores', 'UCPController@players');
Route::get('/dashboard', 'UCPController@index');
Route::get('/busca', 'UCPController@search');
Route::get('/', 'HomeController@index');

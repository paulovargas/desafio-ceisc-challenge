<?php
Auth::routes();

Route::get('/posts/novo', 'PostsController@novo');
Route::post('/posts/novo', 'PostagemController@store');

Route::get('/posts/editar', 'PostsController@editar');
Route::post('/posts/editar', 'PostagemController@store');

Route::get('/posts/deletar/{id}', 'PostagemController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/postagem/', 'PublicController@postagem');
Route::get('/editar/', 'PublicController@postagem');
Route::get('/', 'PublicController@index');
<?php
Auth::routes();

Route::get('/posts/novo', 'PostsController@novo')->name('novo');

Route::post('/posts/novo', 'PostagemController@novo')->name('novo');;

Route::get('/posts/editar', 'PostsController@editar');

Route::post('/posts/editar', 'PostagemController@store');

Route::get('/posts/editar', 'PostagemController@store');

Route::get('/posts/edit/{id}', 'PostagemController@edit');

Route::get('/posts/deletar/{id}', 'PostagemController@destroy');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PublicController@index');

Route::get('/posts/edit/{id}', 'PostagemController@edit')->name('editar_post');

//Route::get('/posts/novo', 'PostagemController@novo')->name('novo');

//Route::post('/posts/novo', 'PostagemController@novo')->name('novo');

Route::get('/posts/edit', 'PostagemController@update')->name('editar');

Route::post('/posts/edit', 'PostagemController@update')->name('editar');

Route::get('/posts/publicar/{id}', 'PostagemController@publicar')->name('publicar_post');

Route::post('/posts/publicar/{id}', 'PostagemController@publicar')->name('publicar_post');

Route::get('/posts/abrir/{id}', 'PostagemController@abrir')->name('abrir_post');

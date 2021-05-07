<?php


Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	//CRUD
	Route::get('/products', 'ProductController@index'); //listado
	Route::get('/products/create', 'ProductController@create');//formulario
	Route::post('/products/create', 'ProductController@store');//regustrar		
	Route::get('/products/{id}/edit', 'ProductController@edit');//formulario edicion
	Route::post('/products/{id}/edit', 'ProductController@update');//eliminar
	Route::delete('/products/{id}', 'ProductController@destroy');//formulario eliminiación

	Route::get('/products/{id}/images', 'ImageController@index');//Listado
	Route::post('/products/{id}/images', 'ImageController@store');//regustrar		
	Route::delete('/products/{id}/images', 'ImageController@destroy');//formulario eliminiación
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select');

	Route::get('/categories', 'CategoryController@index'); //listado
	Route::get('/categories/create', 'CategoryController@create');//formulario
	Route::post('/categories/create', 'CategoryController@store');//regustrar		
	Route::get('/categories/{category}/edit', 'CategoryController@edit');//formulario edicion
	Route::post('/categories/{category}/edit', 'CategoryController@update');//eliminar
	Route::delete('/categories/{category}', 'CategoryController@destroy');//formulario eliminiación
});


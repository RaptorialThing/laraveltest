<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [
	'uses' => 'ContactUsFormController@createForm'
]);

Route::post('/contact',[
	'uses' => 'ContactUsFormController@ContactUsForm',
	'as' => 'contact.store'
]);

Route::get('/product/create', [
	'uses' => 'ProductFormController@createProduct'
]);

Route::post('/product/create',[
	'uses' => 'ProductFormController@createForm',
	'as' => 'product.store'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

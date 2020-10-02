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
// welcome
Route::get('/' , 'WelcomeController@index');
Route::get('pro' , 'WelcomeController@GetPro');

// home
Route::get('/get/items' , 'HomeController@getItems');
Route::post('/add/item' , 'HomeController@addItem');
Route::get('edit/item/{id}' , 'HomeController@edit');
Route::put('update/{id}' , 'HomeController@update');
Route::delete('delete/{id}' , 'HomeController@delete');

// card
Route::get('/cards' , 'HomeController@cards');
Route::get('get/cards' , 'HomeController@Getcards');
Route::post('add/cart/{id}' ,'WelcomeController@add' );
Route::delete('delete/card/{id}' , 'HomeController@deletecard');

// saves
Route::get('/saves' , 'HomeController@saves');
Route::get('get/save' , 'HomeController@getSaves');
Route::post('save/{id}' , 'WelcomeController@save');
Route::delete('delete/save/{id}' , 'HomeController@deletesaved');

// orders
Route::get('order' , 'HomeController@order');
Route::get('get/orders' , 'HomeController@getOrders');
Route::post('make/order' , 'HomeController@makeOrder');
Route::delete('delete/order/{id}' ,'HomeController@DeleteOrder' );

// infos
Route::get('info' , 'HomeController@info');
Route::put('/send/info' , 'HomeController@sendInfo');
Route::get('/get/info' , 'HomeController@getInfo');

// show

Route::get('/show/{id}' , 'HomeController@Show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



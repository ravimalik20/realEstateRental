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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/listing/search', 'ListingController@search');
Route::post('/listing/image/upload', 'ListingController@uploadImage');
Route::resource('listing', 'ListingController');

?>

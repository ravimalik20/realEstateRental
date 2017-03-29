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

Route::get('/listing/search', 'ListingController@search');
Route::post('/listing/image/upload', 'ListingController@uploadImage');
Route::resource('listing', 'ListingController');

Route::resource('listing.contact', 'ListingContactController');

Route::post('post/comment', 'BlogController@addComment');
Route::resource('blog', 'BlogController');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index');

	Route::resource('profile', 'ProfileController');

	Route::get('admin/posts/{id}/approve', 'PostController@approvePost');
	Route::get('admin/posts/{id}/delete', 'PostController@deletePost');
	Route::get('admin/comment/{id}/delete', 'PostController@deleteComment');
	Route::resource('posts', 'PostController');
});

?>

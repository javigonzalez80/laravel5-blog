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

Route::get('/', 'BlogController@home'); 

Route::get('blog', 'BlogController@index');

Route::get('error', 'BlogController@error');
	
Route::get('blog/{slug}', 'BlogController@single');

Route::get('blog/category/{slug}', 'BlogController@category');

Route::get('blog/tag/{slug}', 'BlogController@tag');

Route::post('blog/{slug}', ['uses' => 'BlogController@commentform', 'as' => 'blog.commentform']);

Route::get('admin', 'AdminController@dashboard');


Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('articles', 'ArticlesController');
	
	Route::resource('categories', 'CategoriesController');
	
	Route::resource('tags', 'TagsController');
	
	Route::resource('comments', 'CommentsController');
	
	
});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

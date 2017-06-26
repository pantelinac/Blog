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

Route::post('contact','PagesController@postContact');
Route::get('blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' =>'blog.single'])
        ->where('slug','[\w\d\-\_]+');

// Authentication Routes
Route::get('auth/login', ['uses' =>'Auth\AuthController@getLogin', 'as' => 'login']);
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout',['uses' =>'Auth\AuthController@getLogout', 'as' => 'logout']);

// Registration Routes
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

// Password Reset Routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Comments
Route::post('comments/{post_id}',['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

// Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Pages
Route::get('blog',['uses' => 'BlogController@getIndex','as' => 'blog.index']);
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

// Posts
Route::resource('posts', 'PostController');


//Route::group(['middleware'=>['web']],function(){
//});
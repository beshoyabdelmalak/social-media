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
})->name('home');

Route::post('/signup',[
    'uses' => 'UserController@signup',
    'as' => 'signup',
]);

Route::post('/signin',[
    'uses' => 'UserController@signin',
    'as' => 'signin',
]);

Route::get('/logout',[
    'uses' => 'UserController@logout',
    'as' => 'logout',
    'middleware' => 'auth'
]);

Route::get('/profile',[
    'uses' => 'UserController@getAccount',
    'as' =>'profile',
    'middleware' => 'auth'
]);
Route::post('/edit',[
    'uses' => 'UserController@update',
    'as' => 'edit',
    'middleware' => 'auth'
]);
Route::view('/update', 'edit_profile')->name('update')->middleware('auth');
Route::get('/dashboard',[
    'uses' => 'PostController@dashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);
Route::post('/createpost',[
    'uses' => 'PostController@createPost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);
Route::post('/deletePost',[
    'uses' => 'PostController@deletePost',
    'as' => 'deletePost',
    'middleware' => 'auth'
]);
Route::post('/editPost',[
    'uses' => 'PostController@editPost',
    'as' => 'editPost',
    'middleware' => 'auth'
]);
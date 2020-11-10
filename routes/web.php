<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/main', function () {
    return view('main');
});

Route::namespace('App\Http\Controllers')->name('blog.')->prefix('blog')->group(function(){
    Route::get('main', 'BlogController@index')->name('main');
    Route::get('post/{id}', 'BlogController@showPost')->name('post');
    Route::get('category/{id}', 'BlogController@showCategory')->name('category');
});

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', 'DashboardController');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
});

// Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->group(function(){
//     Route::put('posts/update/{id}', 'PostController@update')->name('posts.update');
//     Route::resource('posts', 'PostController');
//     Route::put('categories/update/{id}', 'CategoryController@update')->name('categories.update');
//     Route::resource('categories', 'CategoryController');
// });

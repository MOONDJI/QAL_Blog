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
    Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
    Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');

    Route::get('categories/trashed', 'CategoryController@trashed')->name('categories.trashed');
    Route::post('categories/restore/{id}', 'CategoryController@restore')->name('categories.restore');
    Route::delete('categories/force/{id}', 'CategoryController@force')->name('categories.force');

    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
});

Route::resource('profiles', 'App\Http\Controllers\ProfileController');


// Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->group(function(){
//     Route::put('posts/update/{id}', 'PostController@update')->name('posts.update');
//     Route::resource('posts', 'PostController');
//     Route::put('categories/update/{id}', 'CategoryController@update')->name('categories.update');
//     Route::resource('categories', 'CategoryController');
// });

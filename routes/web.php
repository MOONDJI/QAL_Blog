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
    Route::resource('posts', 'BlogController');
    Route::resource('post', 'BlogController');
});

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('cms')->group(function(){
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
});

<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\WelcomeController;
use  \App\Http\Controllers\AboutController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;

use \App\Http\Controllers\Admin\IndexController as AdminIndexController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/', WelcomeController::class)
    ->name('home');

Route::get('/about', AboutController::class)
    ->name('about');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.item');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.item');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminIndexController::class)
        ->name('index');
    Route::resource('/news', AdminNewsController::class)
        ->name('index','news');
});



<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\WelcomeController;
use  \App\Http\Controllers\AboutController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;

use \App\Http\Controllers\Admin\IndexController as AdminIndexController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use \App\Http\Controllers\Admin\ParserController as AdminParserController;

use \App\Http\Controllers\FeedbackController;
use \App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

use \App\Http\Controllers\SocialController;

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


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::resource('/news', AdminNewsController::class)
            ->name('index', 'news');
        Route::resource('/categories', AdminCategoryController::class)
            ->name('index', 'categories');
        Route::resource('/sources', AdminSourceController::class)
            ->name('index', 'sources');
        Route::resource('/users', AdminUserController::class)
            ->name('index', 'users');
        Route::get('/parse/{source}', AdminParserController::class)
            ->name('parse')
            ->where('source', '\d+');
    });
});

Route::group(['prefix' => 'fb', 'as' => 'feedback.'], function () {
    Route::get('/', [FeedbackController::class, 'create'])
        ->name('create');
    Route::post('/', [FeedbackController::class, 'store'])
        ->name('store');
});

Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
    Route::get('/', [OrderController::class, 'create'])
        ->name('create');
    Route::post('/', [OrderController::class, 'store'])
        ->name('store');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/redirect/{driver}', [SocialController::class, 'redirect'])
        ->name('social.auth.redirect')
        ->where('driver', '\w+');
    Route::get('/auth/callback/{driver}', [SocialController::class, 'callback'])
        ->name('social.auth.callback')
        ->where('driver', '\w+');
});



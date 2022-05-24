<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Models\User;
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

Route::get('/', [HomeController::class, 'index']);

Route::controller(UserController::class)->group(function(){
    Route::get('/register', 'viewRegister');
    Route::post('/register','actionRegister')->name('register');
    Route::get('/login','viewLogin');
    Route::post('/login','actionLogin')->name('login');
});

Route::post('/comment', [CommentController::class, 'comment'])->name('comment');

Route::middleware('auth')->group(function(){
    Route::get('/home', function(){
        return view('welcome');
    })->name('home');
    Route::get('/show/{slug}', [HomeController::class, 'show'])->name('show');
    Route::get('/like/{model}/{type}', [LikeController::class, 'like'])->name('like');
});

Route::controller(PostController::class)->middleware('auth')->group(function(){
    Route::get('/posts', 'index')->name('posts');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
});


<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::resource('articles', ArticlesController::class);

Route::get('/hello', [HelloController::class, 'sayHello']);

Route::get('/auth/login', [LoginController::class, 'loginForm'])->name('auth.login');
Route::post('/auth/auth', [LoginController::class, 'authentication'])->name('auth.auth');
Route::get('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');

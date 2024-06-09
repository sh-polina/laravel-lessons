<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/downloadImage/{id}', [ArticlesController::class, 'downloadImage'])
    ->name('downloadImage');
Route::resource('articles', ArticlesController::class);


Route::get('/hello', [HelloController::class, 'sayHello']);

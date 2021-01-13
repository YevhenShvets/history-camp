<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('home');
})->name('home-page');

Route::get('/news',  [NewsController::class, 'getAll'])->name('news-page');
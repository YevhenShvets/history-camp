<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('home');
})->name('home-page');

Route::get('/news',  [NewsController::class, 'getAll'])->name('news-page');
Route::get('/news/{id}',  [NewsController::class, 'getPost'])->name('news-post');


Route::get('/tariffs',  [TariffController::class, 'getTariffs'])->name('tariff-page');
Route::post('/tariffs/submit',  [TariffController::class, 'tariffsPost'])->name('tariff-submit');

Route::get('/contact',  [ContactController::class, 'contacts'])->name('contact-page');
Route::post('/contact',  [ContactController::class, 'contactsPost'])->name('contact-post');


Route::get('/tags',  [TagController::class, 'getAllTags'])->name('tags-page');
Route::get('/tags/{name}',  [TagController::class, 'getTagPosts'])->name('tag-name-page');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;

Route::get('/news',  [NewsController::class, 'getAll'])->name('news-page');
Route::get('/news/{id}',  [NewsController::class, 'getPost'])->name('news-post');


Route::get('/tariffs',  [TariffController::class, 'getTariffs'])->name('tariff-page');
Route::post('/tariffs/submit',  [TariffController::class, 'tariffsPost'])->name('tariff-submit');

Route::get('/contact',  [ContactController::class, 'contacts'])->name('contact-page');
Route::post('/contact',  [ContactController::class, 'contactsPost'])->name('contact-post');


Route::get('/tags',  [TagController::class, 'getAllTags'])->name('tags-page');
Route::get('/tags/{name}',  [TagController::class, 'getTagPosts'])->name('tag-name-page');

Route::get('/', [HomeController::class, 'index'])->name('home-page');

Auth::routes();

Route::match(['get', 'post'], 'register', function(){
    return redirect()->route('home-page');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [Admin\IndexController::class, 'index'])->name('admin-index');
    
    
    Route::get('/post', [Admin\IndexController::class, 'post_add'])->name('admin-add-post');
    Route::post('/post/submit', [Admin\AddController::class, 'post_add_submit'])->name('admin-add-post-submit');

    Route::get('/post/{id}/edit', [Admin\EditController::class, 'post_edit'])->name('admin-edit-post');
    Route::post('/post/{id}/edit/submit', [Admin\EditController::class, 'post_edit_submit'])->name('admin-edit-post-submit');
    Route::get('/post/{id}/delete', [Admin\DeleteController::class, 'post_delete'])->name('admin-delete-post');
    
    
    Route::get('/tariff', [Admin\IndexController::class, 'tariff_add'])->name('admin-add-tariff');
    Route::post('/tariff/submit', [Admin\AddController::class, 'tariff_add_submit'])->name('admin-add-tariff-submit');

    Route::get('/tariff/{id}/edit', [Admin\EditController::class, 'tariff_edit'])->name('admin-edit-tariff');
    Route::post('/tariff/{id}/edit/submit', [Admin\EditController::class, 'tariff_edit_submit'])->name('admin-edit-tariff-submit');
    Route::get('/tariff/{id}/delete', [Admin\DeleteController::class, 'tariff_delete'])->name('admin-delete-tariff');

    Route::get('/showTariffs', [Admin\IndexController::class, 'tariff_show'])->name('admin-show-tariff');
    Route::get('/showFeedback', [Admin\IndexController::class, 'feedback_show'])->name('admin-show-feedback');

});
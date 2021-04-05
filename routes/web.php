<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TourController;
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

Route::get('/user', [HomeController::class, 'user_home'])->name('user-home');

Route::get('/tours',  [TourController::class, 'getAllTours'])->name('tours-page');
Route::post('/tours',  [TourController::class, 'getAllToursSubmit'])->name('tours-page-submit');
Route::get('/tours/{id}',  [TourController::class, 'getTour'])->name('tour-id-page');
Route::post('/tours/{id}/submit',  [TourController::class, 'TourSubmit'])->name('tour-id-submit');
Route::post('/tours/{id}/feedback',  [TourController::class, 'TourFeedback'])->name('tour-id-feedback');
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('guest:admin')->group(function () {                        
    Route::get('/login', [App\Http\Controllers\Admin\IndexController::class, 'login'])->name('admin-login');
    Route::post('/login', [App\Http\Controllers\Admin\IndexController::class, 'loginSubmit'])->name('admin-login-submit');
});

Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('/', [Admin\IndexController::class, 'index'])->name('admin-index');
    Route::get('/logout', [Admin\IndexController::class, 'logout'])->name('admin-logout');
    
    
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
    Route::get('/showTour', [Admin\IndexController::class, 'tour_show'])->name('admin-show-tour');
    Route::get('/showFeedback', [Admin\IndexController::class, 'feedback_show'])->name('admin-show-feedback');
    Route::post('/showFeedback/submit', [Admin\IndexController::class, 'feedback_show_submit'])->name('admin-show-feedback-submit'); 

    //add_tour
    Route::get('/tour', [Admin\IndexController::class, 'tour_add'])->name('admin-add-tour');
    Route::post('/tour/submit', [Admin\AddController::class, 'tour_add_submit'])->name('admin-add-tour-submit');
    Route::get('/tour/{id}/edit', [Admin\EditController::class, 'tour_edit'])->name('admin-edit-tour');
    Route::post('/tour/{id}/edit/submit', [Admin\EditController::class, 'tour_edit_submit'])->name('admin-edit-tour-submit');
    Route::post('/tour/{id}/edit/submitphoto', [Admin\EditController::class, 'tour_edit_submitphoto'])->name('admin-edit-tour-submitphoto');
    Route::post('/tour/{id}/edit/deletephoto', [Admin\DeleteController::class, 'tour_edit_deletephoto'])->name('admin-edit-tour-deletephoto');
    Route::get('/tour/{id}/edit/route', [Admin\EditController::class, 'tour_edit_add_route'])->name('admin-edit-tour-add-route');
    Route::post('/tour/{id}/edit/route/submit', [Admin\EditController::class, 'tour_edit_add_route_submit'])->name('admin-edit-tour-add-route-submit');
    Route::post('/tour/{id}/edit/route/delete', [Admin\EditController::class, 'tour_edit_add_route_delete'])->name('admin-edit-tour-add-route-delete');
    Route::post('/tour/{id}/edit/route/edit', [Admin\EditController::class, 'tour_edit_add_route_edit_submit'])->name('admin-edit-tour-add-route-edit-submit');
    Route::get('/tour/{id}/delete', [Admin\DeleteController::class, 'tour_delete'])->name('admin-delete-tour');
});
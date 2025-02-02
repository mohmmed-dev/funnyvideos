<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\HashtagsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Middleware\Lang;
use Illuminate\Support\Facades\Route;

Route::get('/lang-ar' , function () {
    session()->put('lang','ar');
    return back();
})->name('ar');
Route::get('/lang-en' , function () {
    session()->put('lang','en');
    return back();
})->name('en');



Route::get('/', [VideosController::class , 'index'])->name('home');


Route::resource('/video', VideosController::class);

Route::get('/myvideos', [VideosController::class , 'myVideos'])->name('myVideos');
Route::get('/searchmyvideos', [VideosController::class , 'searchMyVideos'])->name('search.my.videos');

Route::get('/hashtag/{hashtag}', [VideosController::class , 'hashtagFilter'])->name('hashtag');

// Channels Routes
Route::get('/Channels', [ChannelsController::class , 'index'])->name('Channels');
Route::get('/Channels/{user}', [ChannelsController::class , 'show'])->name('Channels.show');
Route::get('/searchChannels', [ChannelsController::class , 'searchChannels'])->name('search.Channels');

// Record Routes
Route::get('/myrecord', [RecordController::class , 'index'])->name('myRecords');
Route::delete('/deleterecord/{video}', [RecordController::class , 'deleteFromRecord'])->name('delete.record');
Route::delete('/deleteallrecords', [RecordController::class , 'deleteAllRecords'])->name('delete.all.records');

Route::get('/notifications', NotificationsController::class)->name('notifications');


Route::prefix('admin')->name('admin.')->middleware(['auth','can:update_user'])->group(function () {
    Route::get('dashboard', [AdminController::class , 'index'])->name('dashboard');
    Route::get('Channels', [AdminController::class , 'Channels'])->name('Channels');
    Route::get('roles/search', [AdminController::class , 'rolesSearch'])->name('roles.search');
    Route::get('mostvideos', [AdminController::class , 'mostVideos'])->name('mostvideos');
    Route::get('hashtags', [HashtagsController::class , 'index'])->name('hashtags');
    Route::delete('hashtags/{hashtag}', [HashtagsController::class , 'destroy'])->name('hashtag.destroy');
    Route::post('hashtags', [HashtagsController::class , 'store'])->name('hashtag.store');
    Route::middleware('can:delete_user')->group(function() {
        Route::get('roles', [AdminController::class , 'roles'])->name('roles');
        Route::get('block', [AdminController::class , 'block'])->name('block');
        Route::patch('roles/update/{user}', [ChannelsController::class , 'update'])->name('roles.update');
        Route::delete('roles/destroy/{user}', [ChannelsController::class , 'destroy'])->name('roles.destroy');
    });
});



Route::redirect('/dashboard' ,'/');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

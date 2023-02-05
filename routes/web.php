<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::middleware('auth')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name(name: 'posts.index');
    Route::get('/posts/create', 'create')->name(name: 'posts.create');
    Route::post('/posts/store', 'store')->name('posts.store');
    Route::get('/posts/{id}', 'show')->name(name: 'posts.show');
    Route::get('/posts/{id}/edit', 'edit')->name(name: 'posts.edit');
    Route::put('/posts/{id}', 'update')->name(name: 'posts.update');
    Route::DELETE('/posts/{id}','destroy')->name('posts.destroy');
    Route::get('/posts/restore/{id}', 'restore')->name('posts.restore');
    Route::get('posts/forcedelete/{id}', 'forceDelete')->name('posts.force.delete');
    Route::get('/posts/showdeletedpost/{id}','showDeletedPost')->name('posts.show.deleted');
});

Route::get('/posts/ajax/{id}',[AjaxController::class,'show'])->name('posts.show.model');
Route::get('/posts/deleted/ajax/{id}',[AjaxController::class,'show_deleted'])->name('deleted.posts.show.model');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
Route::PUT('/users/{id}',[UserController::class,'update'])->name('users.update');


use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});

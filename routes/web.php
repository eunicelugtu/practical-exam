<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/timeline', [AuthController::class, 'showTimeline'])->name('showTimeline');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/posts/create', [PostController::class, 'createPost'])->name('createPost');
    Route::post('/posts/save', [PostController::class, 'savePost'])->name('savePost');

    Route:: get('/post/{id}', [PostController::class, 'showPost'])->name('showPost');

    Route::get('/post/{id}/edit', [PostController::class, 'editPost'])->name('editPost');
    Route::put('post/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');

    Route::delete('post/{id}/delete', [PostController::class, 'deletePost'])->name('deletePost');
});
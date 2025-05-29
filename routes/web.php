<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/posts', [BlogController::class, 'post'])->name('blog');
Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/about', [BlogController::class, 'about'])->name('about');
Route::get('/contact', [BlogController::class, 'contact'])->name('contact');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'verified'],

], function () {
    Route::get('/', function () {return view('dashboard');})->name('dashboard');

    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/edit/{post:slug}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete', [PostController::class, 'delete'])->name('post.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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
    Route::group([
        'prefix' => 'post',

    ], function() {
        Route::get('/', [PostController::class, 'index'])->name('dashboard');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/', [PostController::class, 'store'])->name('post.store');
        Route::get('/{post:slug}', [PostController::class, 'show'])->name('post.show');
        Route::get('/{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/{post:slug}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/{post:slug}', [PostController::class, 'delete'])->name('post.delete');

        Route::post('/uploud-cover-image', [PostController::class, 'uploudCoverImage'])->name('post.uploud-cover-image');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/uploud-avatar', [ProfileController::class, 'uploudAvatar'])->name('profile.uploud-avatar');
});

require __DIR__.'/auth.php';

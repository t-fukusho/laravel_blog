<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Article
//article.show
Route::get('/blog/article/{id}', [ArticleController::class, 'show'])->name('article.show');
//article.edit
Route::post('/blog/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
//article.update
Route::post('/blog/article/{id}', [ArticleController::class, 'update'])->name('article.update');
//article_like
require __DIR__.'/auth.php';

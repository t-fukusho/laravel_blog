<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyArticleController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/blog/mypage/{id}', [MypageController::class, 'show'])->name('mypage.show');
    Route::get('/blog/my_article_list/{id}', [MyArticleController::class, 'index'])->name('myArticle.index');
    Route::get('/blog/like_list/{id}', [LikeController::class, 'index'])->name('like.index');
});
require __DIR__.'/auth.php';

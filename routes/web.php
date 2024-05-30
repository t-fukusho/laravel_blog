<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyArticleController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ArticleController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyProfileController;


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



Route::get('/blog/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/blog/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/blog/article/{id}', [ArticleController::class, 'update'])->name('article.update');
Route::post('/blog/article/{id}', [ArticleController::class, 'like'])->name('article.like');

Route::middleware('auth')->group(function () {
    Route::resource('blog', ArticleController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/blog/mypage/{id}', [MypageController::class, 'show'])->name('mypage.show');
    Route::get('/blog/my_article_list/{id}', [MyArticleController::class, 'index'])->name('myArticle.index');
    Route::get('/blog/like_list/{id}', [LikeController::class, 'index'])->name('like.index');
    // プロフィール編集画面
    Route::get('/blog/mypage/{id}/edit', [MyProfileController::class, 'edit'])->name('myprofile.edit');
    // プロフィール更新
    Route::post('/blog/mypage/{id}/edit', [MyProfileController::class, 'update'])->name('myprofile.update');
    // アカウント削除
    Route::delete('/blog/mypage/{id}', [MyProfileController::class, 'destroy'])->name('myprofile.destroy');
});

require __DIR__ . '/auth.php';

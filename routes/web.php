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


Route::middleware('auth')->group(function () {
    Route::get('/blog/article/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::post('/blog/article/{id}/back', [ArticleController::class, 'goBack'])->name('article.back');
    Route::post('/blog/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/blog/article/{id}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::post('/blog/article/{id}/like', [LikeController::class, 'store'])->name('like.store');
    Route::post('/blog/article/{id}/comment', [ArticleController::class, 'commentStore'])->name('article.commentStore');
    Route::post('/blog/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/blog/create/update', [ArticleController::class, 'createUpdate'])->name('article.createupdate');
});
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
    // ユーザー情報の編集画面を表示するためのルート
    Route::get('/user/{id}/edit', [MyProfileController::class, 'iconedit'])->name('myprofile.icon_edit');
    // ユーザー情報の更新を行うためのルート
    Route::post('/user/{id}/edit', [MyProfileController::class, 'icon_update'])->name('myprofile.icon_update');
    // アカウント削除
    Route::delete('/blog/mypage/{id}', [MyProfileController::class, 'destroy'])->name('myprofile.destroy');
});

require __DIR__ . '/auth.php';

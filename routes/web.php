<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyProfileController;

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

// プロフィール編集画面
Route::get('/blog/mypage/{id}/edit', [MyProfileController::class, 'edit'])->name('myprofile.edit');
// プロフィール更新
Route::post('/blog/mypage/{id}/edit', [MyProfileController::class, 'update'])->name('myprofile.update');
// アカウント削除
Route::delete('/blog/mypage/{id}', [MyProfileController::class, 'destroy'])->name('myprofile.destroy');

require __DIR__ . '/auth.php';

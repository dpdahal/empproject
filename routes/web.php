<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\UserController;

Route::get('/', [ApplicationController::class, 'index'])->name('index');
Route::get('about', [ApplicationController::class, 'about'])->name('about');
Route::get('contact', [ApplicationController::class, 'contact'])->name('contact');
Route::get('category/{slug?}', [ApplicationController::class, 'category'])->name('category');
Route::get('news/{slug?}', [ApplicationController::class, 'news'])->name('news');
Route::get('search', [ApplicationController::class, 'search'])->name('search');

// ====Route for backend==============
Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('users', [UserController::class, 'index'])->name('users')->middleware('isAdmin');
    Route::any('edit-user-profile/{id?}', [UserController::class, 'updateProfile'])->name('edit-user-profile');
    Route::any('update-role', [UserController::class, 'updateRole'])->name('update-role');
    Route::any('view-profile/{id}', [UserController::class, 'viewProfile'])->name('view-profile');
    Route::resource('manage-category', "\App\Http\Controllers\Backend\CategoryController");
    Route::resource('manage-news', "\App\Http\Controllers\Backend\NewsController");
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
});

require_once __DIR__ . '/auth.php';


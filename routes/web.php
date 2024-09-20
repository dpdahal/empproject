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


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


// ====Route for backend==============
Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::any('edit-user-profile', [UserController::class, 'updateProfile'])->name('edit-user-profile');
    Route::any('update-role', [UserController::class, 'updateRole'])->name('update-role');
    Route::any('view-profile/{id}', [UserController::class, 'viewProfile'])->name('view-profile');


    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
});


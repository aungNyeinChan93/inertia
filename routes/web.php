<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


Route::middleware(["guest"])->group(function () {

    Route::inertia('/guest', 'Guest')->name('guest');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register.store');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');

});

Route::middleware(["auth"])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get(uri: '/', action: [UserController::class, 'home'])->name('home');
    Route::delete(uri: 'users/{user}/delete', action: [UserController::class, 'destory'])->name('user.destory');

    Route::inertia('/about', 'About', ['about' => 'About page'])->name('about');
});


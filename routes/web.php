<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


Route::middleware(["guest"])->group(function () {
    Route::inertia('/guest','Guest')->name('guest');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register.store');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
});

Route::middleware(["auth"])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        $users = User::query()->get();
        return Inertia::render('Home', [
            'users' => $users,
        ]);
    })->name('home');

    Route::inertia('/about', 'About', ['about' => 'About page'])->name('about');
});


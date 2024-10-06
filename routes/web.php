<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
});
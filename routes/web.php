<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');
});

Route::middleware(['guest'])->group(function () {
    Route::get('register', [AuthController::class, 'register_form'])->name('register');
    Route::get('login', [AuthController::class, 'login_form'])->name('login');
});
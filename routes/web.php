<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('website');

Route::get('/admin', function () {
    $admin_asset = asset('admin_assets');
    return view('index', ['admin_asset' => $admin_asset]);
})->name('home');
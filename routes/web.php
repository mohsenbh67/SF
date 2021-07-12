<?php

use Illuminate\Support\Facades\Route;

// Default Routes
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Custom Routes
Route::resource('shop','ShopController');

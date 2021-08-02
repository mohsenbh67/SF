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
Route::resource('shop','ShopController')->except('show');
Route::post('product/{id}/restore','ProductController@restore')->name('product.restore');
Route::resource('product','ProductController')->except('show');


// public Routes
Route::get('landing/{page}','LandingController@loadpage')->name('landing');

// add to cart
Route::post('cart/manage/{product}','CartController@manage')->name('cart.manage');

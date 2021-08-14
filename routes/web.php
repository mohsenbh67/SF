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
Route::get('landing/shop/{shop}','LandingController@showShop')->name('shop.show');

// add to cart
Route::post('cart/manage/{product}','CartController@manage')->name('cart.manage');
Route::post('cart/finish','CartController@finish')->name('cart.finish');
Route::delete('cart/{cart_item}','CartController@remove')->name('cart.remove');

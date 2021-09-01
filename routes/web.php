<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderDetailController;



Route::get('/', [HomeController::class, 'index'])->name('shop.home');
Route::resource('order-manager', OrderController::class);
Route::resource('customer-manager', CustomerController::class);
Route::resource('product-manager', ProductController::class);
Route::resource('order-detail-manager', OrderDetailController::class);
Route::post('getCustomer',[CustomerController::class, 'getCustomer'])->name('customer-manager.getCustomer');
Route::post('getProduct',[ProductController::class, 'getProduct'])->name('product-manager.getProduct');
Route::post('getCart',[OrderController::class, 'getCart'])->name('cart.getCart');
Route::post('delCart',[OrderController::class, 'delCart'])->name('order-detail-manager.delCart');
Route::post('addCart',[OrderController::class, 'addCart'])->name('order-detail-manager.addCart');

<?php

use App\Http\Controllers\ConfectioneryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/confectionery/create', [ConfectioneryController::class,"create"])->name('confectionery.create');
Route::post('/confectionery/store', [ConfectioneryController::class,"store"])->name('confectionery.store');
Route::get('/confectionery/list', [ConfectioneryController::class,"list"])->name('confectionery.list');
Route::get('/confectionery/{confectionery}', [ConfectioneryController::class,"edit"])->name('confectionery.edit');
Route::put('/confectionery/{confectionery}', [ConfectioneryController::class,"update"])->name('confectionery.update');
Route::delete('/confectionery/{confectionery}', [ConfectioneryController::class,"destroy"])->name('confectionery.destroy');
Route::get('/confectionery/show/{confectionery}', [ConfectioneryController::class,"show"])->name('confectionery.show');

Route::get('/product/create', [ProductController::class,"create"])->name('product.create');
Route::post('/product/store', [ProductController::class,"store"])->name('product.store');
Route::get('/product/list', [ProductController::class,"list"])->name('product.list');
Route::get('/product/{product}', [ProductController::class,"edit"])->name('product.edit');
Route::put('/product/{product}', [ProductController::class,"update"])->name('product.update');
Route::delete('/product/{product}', [ProductController::class,"destroy"])->name('product.destroy');

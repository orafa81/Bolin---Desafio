<?php

use App\Http\Controllers\ConfectioneryController;
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
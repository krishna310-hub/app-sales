<?php

use App\Http\Controllers\salesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('sales', [salesController::class, 'sales'])->name('sales');
Route::post('store', [salesController::class, 'store'])->name('store');



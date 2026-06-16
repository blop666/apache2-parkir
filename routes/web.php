<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('location', LocationController::class);
Route::resource('vehicle-type', VehicleTypeController::class);
Route::resource('transaction', TransactionController::class);

Route::post('/transaction/submit-enter', [TransactionController::class, 'submitEnter'])->name('transaction.submitEnter');
Route::post('/transactions/exit', [TransactionController::class, 'exit'])->name('transaction.exit');



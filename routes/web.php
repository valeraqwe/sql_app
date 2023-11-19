<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Redirect the root route to the customers index
Route::redirect('/', '/customers');

// Customer resource routes with grouped attributes
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers', 'index')->name('customers.index');
    Route::get('/customers/create', 'create')->name('customers.create');
    Route::post('/customers', 'store')->name('customers.store');
    Route::get('/customers/{customer}/edit', 'edit')->name('customers.edit');
    Route::put('/customers/{customer}', 'update')->name('customers.update');
    Route::delete('/customers/{customer}', 'destroy')->name('customers.destroy');
});

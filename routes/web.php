<?php

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

Route::get('/', function () {
    return view('welcome');
});

// menu costumer
Route::get('/', function () {
    return view('costumer.menu');
});

// admin dashboard
Route::get('/dashboard', function () {
    return view('kasir.dashboard');
});

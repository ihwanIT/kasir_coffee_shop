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
})->name('kasir.dashboard');
// admin order
Route::get('/orders', function () {
    return view('kasir.orders');
})->name('kasir.orders');
// admin menu

// menu kasir
Route::get('/MenuProduk', function () {
    return view('kasir.menuProduk');
})->name('kasir.menuProduk');
//  karyawan
Route::get('/data-karyawan', function () {
    return view('kasir.karyawan');
})->name('kasir.karyawanCaffee');
//  laporan
Route::get('/laporan', function () {
    return view('kasir.laporan');
})->name('kasir.laporan');

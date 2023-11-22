<?php

use App\Http\Controllers\auth\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud_menu;
use App\Http\Controllers\crud_orders;
use App\Models\kasir\menu;
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
// menu costumer
// Route::get('/', function () {
//     return view('costumer.menu');
// });
// admin login
Route::get('/', [loginController::class, 'index'])->name('auth.login');
Route::post('/login', [loginController::class, 'login'])->name('auth.loginValidation');

// admin dashboard
Route::get('/dashboard', function () {
    return view('kasir.dashboard');
})->name('kasir.dashboard');
// admin order

Route::resource('/orders','App\Http\Controllers\crud_orders');
Route::put('/orders', [crud_orders::class, 'update']);
Route::post('/ordersHapus', [crud_orders::class, 'destroy']);
Route::post('/orders', [crud_orders::class, 'store'])->name('orders.create');
// admin menu

// menu kasir
Route::resource('/MenuProduk','App\Http\Controllers\crud_menu');
Route::put('/MenuProduk', [crud_menu::class, 'update']);
Route::post('/MenuProdukHapus', [crud_menu::class, 'destroy']);
Route::post('/MenuProduk', [crud_menu::class, 'store'])->name('MenuProduk.create');

//  transaksi
Route::get('/transaksi', function () {
    return view('kasir.transaksi');
})->name('kasir.transaksi');
// persediaan
Route::get('/persediaan', function () {
    return view('kasir.persediaan');
})->name('kasir.persediaan');
// penjualan
Route::get('/penjualan', function () {
    return view('kasir.penjualan');
})->name('kasir.penjualan');
//  laporan
Route::get('/admin', function () {
    return view('kasir.admin');
})->name('kasir.admin');
Route::get('/laporan', function () {
    return view('kasir.laporan');
})->name('kasir.laporan');

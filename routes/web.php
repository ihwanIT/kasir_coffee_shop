<?php

use App\Http\Controllers\auth\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud_menu;
use App\Http\Controllers\crudStokController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\OrderCardController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\transaksiSelesaiController;
use App\Models\kasir\menu;
use Carbon\Carbon;
use App\Models\order;
use App\Models\stok;
use App\Models\orderCard;
use App\Models\penjualan;


// admin login
Route::get('/', [loginController::class, 'index'])->name('auth.login')->middleware('guest');
Route::post('/login', [loginController::class, 'login'])->name('auth.loginValidation');
Route::post('/logout', [loginController::class, 'logout'])->name('auth.logout');

// admin dashboard
Route::get('/dashboard', [dashboardController::class, 'index'])->name('kasir.dashboard')->middleware('auth');

// Transaksi selesai
Route::get('/Transaksi-selesai', [transaksiSelesaiController::class, 'index'])->name('kasir.transaksiSelesai')->middleware('auth');
Route::post('/Transaksi-update', [transaksiSelesaiController::class, 'store'])->name('kasir.transaksiUpdate');


// Order dulu
Route::get('/daftar-Order', function () {
    $menus = menu::get();
    $orderBaru = orderCard::orderBy('created_at', 'desc')->first();
    return view('kasir.Order', [
        'menus' => $menus,
        'orderBaru' => $orderBaru
    ]);
})->name('kasir.Order')->middleware('auth');

// menu kasir
Route::resource('/MenuProduk','App\Http\Controllers\crud_menu')->middleware('auth');
Route::put('/MenuProduk', [crud_menu::class, 'update']);
Route::post('/MenuProdukHapus', [crud_menu::class, 'destroy']);
Route::post('/MenuProduk', [crud_menu::class, 'store'])->name('MenuProduk.create');

//  transaksi
// view transaksi
Route::get('/transaksi', [transaksiController::class, 'index'])->name('kasir.transaksi')->middleware('auth');
// deleted transaksi
Route::post('/transaksi', [transaksiController::class, 'destroy'])->name('kasir.cencel');
// cetak struk transaksi
Route::get('/cetakOrderan/{id}', [transaksiController::class, 'cetak'])->name('kasir.cetakOrderan')->middleware('auth');
// end

// persediaan
Route::resource('/persediaan','App\Http\Controllers\crudStokController')->middleware('auth');
Route::put('/persediaanStok', [crudStokController::class, 'update'])->name('persediaan.update');
Route::post('/persediaanHapus', [crudStokController::class, 'destroy']);
Route::post('/persediaan', [crudStokController::class, 'store'])->name('persediaan.create');


// penjualan
Route::get('/penjualan', function () {
    return view('kasir.penjualan');
})->name('kasir.penjualan')->middleware('auth');

//  admin
Route::resource('/admin','App\Http\Controllers\adminController')->middleware('auth');
Route::put('/adminEdit', [adminController::class, 'update'])->name('admin.update');
Route::post('/adminHapus', [adminController::class, 'destroy']);
Route::post('/admin', [adminController::class, 'store'])->name('admin.create');

// laporan
Route::get('/laporan', [laporanController::class, 'index'])->name('kasir.laporan')->middleware('auth');
// cetk laporan penjualan
Route::get('/cetaklaporan', [laporanController::class, 'cetakLaporan'])->name('kasir.CetakLaporan')->middleware('auth');

// daftar orderan
Route::post('/DaftarOrderMenu', [OrderCardController::class, 'store']);
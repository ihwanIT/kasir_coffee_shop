<?php

use App\Http\Controllers\auth\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud_menu;
use App\Http\Controllers\crud_orders;
use App\Http\Controllers\crudStokController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\OrderCardController;
use App\Http\Controllers\transaksiController;
use App\Models\kasir\menu;
use App\Models\penjualan;
use Carbon\Carbon;
use App\Models\order;
use App\Models\stok;


// admin login
Route::get('/', [loginController::class, 'index'])->name('auth.login');
Route::post('/login', [loginController::class, 'login'])->name('auth.loginValidation');

// admin dashboard
Route::get('/dashboard', [dashboardController::class, 'index'])->name('kasir.dashboard');

// orders kasir
Route::resource('/orders','App\Http\Controllers\crud_orders');
Route::put('/orders', [crud_orders::class, 'update']);
Route::post('/ordersHapus', [crud_orders::class, 'destroy']);
Route::post('/orders', [crud_orders::class, 'store']);

// daftar order
Route::get('/daftar-Order', function () {
    $menus = menu::get();
    return view('kasir.daftarOrder', [
        'menus' => $menus
        // 'menus' => menu::latest()->filter(request(['search']))
    ]);
})->name('kasir.daftarOrder');

// menu kasir
Route::resource('/MenuProduk','App\Http\Controllers\crud_menu');
Route::put('/MenuProduk', [crud_menu::class, 'update']);
Route::post('/MenuProdukHapus', [crud_menu::class, 'destroy']);
Route::post('/MenuProduk', [crud_menu::class, 'store'])->name('MenuProduk.create');

//  transaksi
Route::get('/transaksi', [transaksiController::class, 'index'])->name('kasir.transaksi');
Route::post('/transaksi', [transaksiController::class, 'destroy'])->name('kasir.cencel');

// persediaan
Route::resource('/persediaan','App\Http\Controllers\crudStokController');
Route::put('/persediaanStok', [crudStokController::class, 'update'])->name('persediaan.update');
Route::post('/persediaanHapus', [crudStokController::class, 'destroy']);
Route::post('/persediaan', [crudStokController::class, 'store'])->name('persediaan.create');


// penjualan
Route::get('/penjualan', function () {
    return view('kasir.penjualan');
})->name('kasir.penjualan');

//  admin
Route::resource('/admin','App\Http\Controllers\adminController');
Route::put('/adminEdit', [adminController::class, 'update'])->name('admin.update');
Route::post('/adminHapus', [adminController::class, 'destroy']);
Route::post('/admin', [adminController::class, 'store'])->name('admin.create');

// laporan
Route::get('/laporan', [laporanController::class, 'index'])->name('kasir.laporan');

// cetk laporan penjualan
Route::get('/cetaklaporan', function(){
    $orders = order::select(
        'nama_orderan', 'harga',
        order::raw('DATE(created_at) as created_at'),
        order::raw('SUM(total) as total'),
        order::raw('SUM(jumlah) as jumlah')
    )
    ->groupBy('nama_orderan', 'created_at')
    ->get();

    $totalPembelian = order::sum('jumlah');
    $totalHarga = order::sum('total');
    $stoks = stok::get();
    $TotalPengeluaran = stok::sum('harga_beli');
    $totalLabaBersih = $totalHarga-$TotalPengeluaran;
    $dataStok = menu::get();
    if($totalLabaBersih < 0){
        $data = "Rugi";
    }
    else{
        $data = "Laba";
    }
    // $Totalstok = stok::sum('id');


    $tanggalSekarang = Carbon::now()->format('d F Y');
    return view("kasir.CetakLaporan", compact("dataStok","data", "totalLabaBersih","TotalPengeluaran" ,"orders", "tanggalSekarang", "totalPembelian", "totalHarga", "stoks"));
})->name('kasir.CetakLaporan');


Route::post('/DaftarOrderMenu', [OrderCardController::class, 'store']);
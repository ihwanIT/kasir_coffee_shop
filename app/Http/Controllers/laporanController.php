<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\kasir\menu;
use App\Models\stok;
use App\Models\penjualan;
use Illuminate\Support\Facades\DB;

class laporanController extends Controller
{
    public function index(){

        // $orders = DB::table('orders')
        // ->select(
        //     'nama_orderan', 'harga',
        //     DB::raw('DATE(created_at) as tanggal_order'),
        //     DB::raw('SUM(total) as total'),
        //     DB::raw('SUM(jumlah) as jumlah')
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

        return view("kasir.laporan", compact("orders", "totalHarga", "totalPembelian"));

    }
}

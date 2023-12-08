<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use App\Models\orderCard;
use App\Models\order;
use Carbon\Carbon;
use App\Models\kasir\menu;
use App\Charts\OrdersChart;


class dashboardController extends Controller
{
    public function index(ordersChart $orderChart){


        // penjualan harian
        $total_penjualan = order::whereDate('created_at', Carbon::today())->sum('jumlah');
        $penjualanTotal = order::get()->sum('jumlah');
        // pendapatan harian
        $pendapatan_penjualan = order::whereDate('created_at', Carbon::today())->sum('total');
        $totalPendapatan = order::get()->sum('total');
        $orders = order::whereDate('created_at', Carbon::today())->get();

        $lowStockMenu = menu::where('jumlah', '<', 10)->get();

        $today = Carbon::today();
        $orderWithHighestTotal = Order::select('nama_orderan', order::raw('SUM(total) as total_penjualan'))
        ->whereDate('created_at', $today)
        ->groupBy('nama_orderan')
        ->orderByDesc('total_penjualan')
        ->first();

            $totalBanyakDibeli = Order::select('nama_orderan')
    ->groupBy('nama_orderan')
    ->orderByRaw('SUM(jumlah) DESC')
    ->value('nama_orderan');


        $tanggalSekarang = Carbon::now()->format('d F Y');
        $orderCards = OrderCard::all();


        $orderCards = OrderCard::all();
        $totalQuantity = 0;

        foreach ($orderCards as $orderCard) {
            $quantities = explode(', ', $orderCard->jumlah);

            foreach ($quantities as $quantity) {
                $totalQuantity += (int)$quantity;
            }
        }

        return view('kasir.dashboard', 
        ['orders'=>$orders,
        'orderCard' =>$orderChart->build(),
        // 'penjualan_menus'=>$penjualan,
        'pendapatan_penjualans'=>$pendapatan_penjualan,
        'total_penjualans'=>$total_penjualan,
        'orderWithHighestTotal'=>$orderWithHighestTotal,
        'lowStok'=>$lowStockMenu,
        'tanggal' =>$tanggalSekarang,
        'totalPenjualan' => $penjualanTotal,
        'totalPendapatan'=>$totalPendapatan,
        'totalBanyakDibeli'=>$totalBanyakDibeli,
        'orderCards' => $orderCards,
        'totalQuantity' => $totalQuantity
    ]);
        
    }
}

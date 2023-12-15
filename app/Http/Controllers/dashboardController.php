<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\kasir\menu;
use App\Charts\OrdersChart;
use App\Models\penjualan;
use App\Models\orderCard;


class dashboardController extends Controller
{
    public function index(ordersChart $orderChart){
        // fungsi hari real-time dengan carbon
        $today = Carbon::today();
        // total pendapatan RP harian
        $pendapatan_penjualanHarian = penjualan::whereDate('created_at', $today)->sum('total_harga');
        $pendapatan_penjualanBulanan = penjualan::get()->sum('total_harga');

        // jumlah penjualan harian 
        $orderCards = penjualan::whereDate('created_at', $today)->get();
        $totalQuantity = 0;

        foreach ($orderCards as $orderCard) {
            $quantities = explode('-', $orderCard->jumlah);

            foreach ($quantities as $quantity) {
                $totalQuantity += (int)$quantity;
            }
        }
        // jumlah penjualan  
        $orderCards = penjualan::get();
        $totalQuantityAll = 0;

        foreach ($orderCards as $orderCard) {
            $quantitiesAll = explode('-', $orderCard->jumlah);

            foreach ($quantitiesAll as $quantity) {
                $totalQuantityAll += (int)$quantity;
            }
        }

        // ============== BANYAK DIBELI SEMUA
        $orderCards = penjualan::all();
        $menuQuantities = [];

        // Hitung jumlah setiap menu
        foreach ($orderCards as $orderCard) {
            $menuItems = explode('-', $orderCard->menu);
            $quantities = explode('-', $orderCard->jumlah);

            foreach ($menuItems as $index => $menuItem) {
                $qty = (int)$quantities[$index];

                if (array_key_exists($menuItem, $menuQuantities)) {
                    $menuQuantities[$menuItem] += $qty;
                } else {
                    $menuQuantities[$menuItem] = $qty;
                }
            }
        }

        // Temukan menu yang paling banyak dipesan
        $mostOrderedMenuAll = '';
        $maxQuantityAll = 0;

        foreach ($menuQuantities as $menuItem => $quantity) {
            if ($quantity > $maxQuantityAll) {
                $mostOrderedMenuAll = $menuItem;
                $maxQuantityAll = $quantity;
            }
        }
        $orderCardsHarian = penjualan::whereDate('created_at', $today)->get();
        $menuQuantities = [];

        // Hitung jumlah setiap menu
        foreach ($orderCardsHarian as $orderCard) {
            $menuItems = explode('-', $orderCard->menu);
            $quantities = explode('-', $orderCard->jumlah);

            foreach ($menuItems as $index => $menuItem) {
                $qty = (int)$quantities[$index];

                if (array_key_exists($menuItem, $menuQuantities)) {
                    $menuQuantities[$menuItem] += $qty;
                } else {
                    $menuQuantities[$menuItem] = $qty;
                }
            }
        }

        // Temukan menu yang paling banyak dipesan
        $mostOrderedMenu = '';
        $maxQuantity = 0;

        foreach ($menuQuantities as $menuItem => $quantity) {
            if ($quantity > $maxQuantity) {
                $mostOrderedMenu = $menuItem;
                $maxQuantity = $quantity;
            }
        }
        // =========

        // $orders = order::whereDate('created_at', Carbon::today())->get();
        $lowStockMenu = menu::where('jumlah', '<', 10)->Paginate(2);
        // tanggal
        $tanggalSekarang = Carbon::now()->format('d F Y');
        // data penjualan harian table
        $dataOrderTable = penjualan::whereDate('created_at', $today)->get();

        $orderChard = orderCard::Paginate(3);



        // ===================================GRAFIK

        return view('kasir.dashboard', [
        'dataOrderTable' => $dataOrderTable,
        'orderCard' =>$orderChart->build(),
        'pendapatan_penjualans'=>$pendapatan_penjualanHarian,
        'lowStok'=>$lowStockMenu,
        'tanggal' =>$tanggalSekarang,
        'pendapatan_penjualanBulanan' => $pendapatan_penjualanBulanan,
        'totalQuantityAll' => $totalQuantityAll, 
        'orderCards' => $orderCardsHarian,
        'totalQuantity' => $totalQuantity,
        'mostOrderedMenuAll' => $mostOrderedMenuAll,
        'mostOrderedMenu' => $mostOrderedMenu,
        'maxQuantity' => $maxQuantity,
        'maxQuantityAll' => $maxQuantityAll,
        'orderChard' => $orderChard
    ]);
        
    }
}

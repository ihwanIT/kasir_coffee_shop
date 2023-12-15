<?php

namespace App\Http\Controllers;

use App\Charts\OrdersChart;
use App\Models\orderCard;
use App\Models\kasir\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderCardController extends Controller
{
    public function store(Request $request)
    {
        // $randomId = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $randomString = Str::random(3); // Generate random string of length 3
        $randomNumber = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT); // Generate random number of length 3
        $randomId = $randomString . $randomNumber; // Combine the string and number

        $order = new orderCard;
        $order->id = $randomId;
        $order->menu = $request->menu; // data menu yang dipesan
        $order->jumlah = $request->jumlah; // Jumlah pesanan
        $order->sub_harga = $request->sub_harga; // Jumlah pesanan
        $order->total_harga = $request->total_harga; // Jumlah pesanan
        $order->keterangan = $request->keterangan; // Jumlah pesanan
        $order->save();
        return back()->with('success', 'Order berhasil ditambah !');
    }
}

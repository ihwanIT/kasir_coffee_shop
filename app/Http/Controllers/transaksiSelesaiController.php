<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use App\Models\orderCard;

class transaksiSelesaiController extends Controller
{
    public function index()
    {
        $transaksiSelesai = penjualan::get();
        return view('kasir.transaksiSelesai', compact('transaksiSelesai'));
    }
    public function store(Request $request)
    {
        $randomId = mt_rand(100000, 999999);

        $menus = new penjualan();
        $menus->id = $randomId;
        $menus->menu = $request->input('nama_DaftarOrder');
        $menus->jumlah = $request->input('jumlah');
        $menus->metode = $request->input('metode');
        $menus->uang = $request->input('uang');
        $menus->kembalian = $request->input('kembalian');
        $menus->total_harga = $request->input('total_DaftarOrder');
        $menus->save();

        $daftarOrder = orderCard::find($request->id);
        $daftarOrder->delete();
        return redirect()->back()->with('success','Transaksi Selesai');
    }
}

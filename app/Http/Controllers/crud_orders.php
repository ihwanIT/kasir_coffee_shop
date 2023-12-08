<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrdersChart;
use App\Models\order;
use App\Models\kasir\menu;
use App\Services\LarapexChart;

class crud_orders extends Controller
{
    public function index(ordersChart $orderChart)
    {
        $menus = menu::all();
        return view('kasir.orders', [
            'orderCard' =>$orderChart->build(),
            'menus' => $menus,
            'orders' => order::latest()->filter(request(['search_orders']))->paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $randomId = mt_rand(100000, 999999);

                // Ambil data dari request
                $namaPembeli = $request->input('name_costumer');
                $namaOrderan = $request->input('pesanan');
                $keterangan = $request->input('keterangan');
                $harga = $request->input('harga');
                $jumlah = $request->input('jumlah');
                $total = $request->input('total_harga_jual');
        
                // Cari menu berdasarkan nama_orderan
                $menu = menu::where('nama', $namaOrderan)->first();
        
                // Jika menu ditemukan dan stok cukup
                if ($menu && $menu->jumlah >= $jumlah) {
                    // Kurangi stok menu
                    $menu->jumlah -= $jumlah;
                    $menu->save();
        
                    // Buat pesanan baru
                    $order = Order::create([
                        'nama_pembeli' => $namaPembeli,
                        'nama_orderan' => $namaOrderan,
                        'keterangan' => $keterangan,
                        'harga' => $harga,
                        'jumlah' => $jumlah,
                        'total' => $total,
                    ]);
        
                    return redirect()->back()->with('success','Pesanan berhasil dibuat');
                }
        
                return redirect()->back()->withErrors('error','Stok kurang');
    }
    public function update(Request $request)
    {
        $menu = order::findOrFail($request->id);
        $menu->update($request->all());
        return back()->with('success' , 'success');
    }

    public function destroy(Request $request)
    {
        $menu = order::find($request->id);
        $menu->delete();
        return back()->with('success' , 'success');

    }
}

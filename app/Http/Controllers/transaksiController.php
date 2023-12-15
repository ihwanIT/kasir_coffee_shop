<?php

namespace App\Http\Controllers;

use App\Models\orderCard;
use Illuminate\Http\Request;
use Carbon\Carbon;

class transaksiController extends Controller
{
    // view transaksi
    public function index()
    {
        $daftarOrders = orderCard::get();
        return view("kasir.transaksi", compact("daftarOrders"));
    }
    
    // print struk transaksi
    public function cetak($id)
    {
        // Mengambil data orderChard berdasarkan ID
        $orderChardData = orderCard::find($id);
    
        if ($orderChardData) {
            // Mendapatkan kolom-kolom yang diperlukan dari orderChard
            $menuColumn = $orderChardData->menu;
            $jumlahColumn = $orderChardData->jumlah;
            $subHargaColumn = $orderChardData->sub_harga;
    
            // Memisahkan data yang dipisahkan oleh tanda "-" menjadi array
            $menus = explode('-', $menuColumn);
            $jumlahs = explode('-', $jumlahColumn);
            $subHargas = explode('-', $subHargaColumn);
            $tanggalSekarang = Carbon::now()->format('d F Y');
            $orderChard = orderCard::find($id);
    
            return view('kasir.CetakOrderan', compact('menus', 'jumlahs', 'subHargas', 'tanggalSekarang', 'orderChard'));
        } else {
            // Handle jika data orderChard tidak ditemukan
            return redirect()->back()->with('error', 'Data orderChard tidak ditemukan.');
        }
    }
    // bayar transaksi
    public function bayar()
    {
        return view("kasir.cetakOrder");
    }

    // hapus transaksi
    public function destroy(Request $request)
    {
        $daftarOrder = orderCard::find($request->id_DaftarOrder);
        $daftarOrder->delete();
        return back()->with('success', 'Orderan berhasil di Cencel');
    }
}

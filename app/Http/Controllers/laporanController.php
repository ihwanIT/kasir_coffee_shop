<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\stok;
use App\Models\kasir\menu;

class laporanController extends Controller
{
    public function index()
    {

        // Query untuk mengambil data dan melakukan pengelompokkan
        $data = Penjualan::select(
            'menu',
            DB::raw('SUM(jumlah) as total_jumlah'),
            DB::raw('SUM(total_harga) as total_pendapatan'),
            'created_at'
        )
            ->groupBy('menu', 'created_at')
            ->get();

        $laporanPenjualan = [];

        foreach ($data as $item) {
            $tanggal = Carbon::parse($item->tanggal_penjualan)->format('d-m-Y');
            // $tanggal = $item->created_at;
            $menus = explode('-', $item->menu);

            foreach ($menus as $menu) {
                $key = $menu . '_' . $tanggal;

                if (!isset($laporanPenjualan[$key])) {
                    $laporanPenjualan[$key] = [
                        'menu' => $menu,
                        'tanggal' => $tanggal,
                        'total_jumlah' => 0,
                        'total_pendapatan' => 0,
                    ];
                }

                // Mengonversi nilai string menjadi integer sebelum penambahan
                $jumlah = intval($item->total_jumlah); // Jika 'jumlah' adalah string

                $laporanPenjualan[$key]['total_jumlah'] += $jumlah;
                $laporanPenjualan[$key]['total_pendapatan'] += $item->total_pendapatan;
            }
        }
        return view('kasir.laporan', ['laporanPenjualan' => $laporanPenjualan]);
    }

    // cetak laporan controller
    public function cetakLaporan()
    {

        // Query untuk mengambil data dan melakukan pengelompokkan
        $data = Penjualan::select(
            'menu',
            DB::raw('SUM(jumlah) as total_jumlah'),
            DB::raw('SUM(total_harga) as total_pendapatan'),
            'created_at'
        )
            ->groupBy('menu', 'created_at')
            ->get();

        $laporanPenjualan = [];

        foreach ($data as $item) {
            $tanggal = Carbon::parse($item->tanggal_penjualan)->format('d-m-Y');
            // $tanggal = $item->created_at;
            $menus = explode('-', $item->menu);

            foreach ($menus as $menu) {
                $key = $menu . '_' . $tanggal;

                if (!isset($laporanPenjualan[$key])) {
                    $laporanPenjualan[$key] = [
                        'menu' => $menu,
                        'tanggal' => $tanggal,
                        'total_jumlah' => 0,
                        'total_pendapatan' => 0,
                    ];
                }

                // Mengonversi nilai string menjadi integer sebelum penambahan
                $jumlah = intval($item->total_jumlah); // Jika 'jumlah' adalah string

                $laporanPenjualan[$key]['total_jumlah'] += $jumlah;
                $laporanPenjualan[$key]['total_pendapatan'] += $item->total_pendapatan;
            }
        }

        $dataJumlahPenjualan = Penjualan::pluck('jumlah')->toArray();

        // Inisialisasi total jumlah penjualan
        $totalPembelian = 0;

        // Loop setiap data jumlah penjualan
        foreach ($dataJumlahPenjualan as $jumlah) {
            // Pisahkan angka-angka yang dipisahkan dengan '-'
            $angka = explode('-', $jumlah);

            // Jumlahkan setiap angka setelah dikonversi ke integer
            foreach ($angka as $nilai) {
                $totalPembelian += intval($nilai);
            }
        }
        $stoks = stok::get();
        $totalHarga = penjualan::sum('total_harga');
        $TotalPengeluaran = stok::sum('harga_beli');
        $totalLabaBersih = $totalHarga-$TotalPengeluaran;
        $dataStok = menu::get();
        $tanggalSekarang = Carbon::now()->format('d F Y');

        return view("kasir.CetakLaporan", compact("dataStok", "totalLabaBersih", "data", "TotalPengeluaran", "tanggalSekarang", "totalPembelian", "totalHarga", "stoks", "laporanPenjualan"));
    }
}

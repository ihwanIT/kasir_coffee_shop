<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\orderCard;
use App\Models\penjualan;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use App\Models\EwallteTransaksi;
use Illuminate\Support\Facades\Http;
// use Midtrans\Config;
// use Midtrans\Transaction;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        // Ambil data orderan dari request
        $orderId = $request->input('id');
        $orderan = $request->input('nama_DaftarOrder');
        $amount = $request->input('total_DaftarOrder');
        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = !env('MIDTRANS_IS_SANDBOX');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        // Data pembayaran untuk dikirim ke Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ),
        );
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

        // Buat transaksi pembayaran menggunakan Midtrans Snap
        $snapToken = Snap::getSnapToken($params);

        // Redirect ke halaman pembayaran Midtrans
        return view('kasir.snap', compact('snapToken'));
    }

    // mengambil data transaksi dari dashboard midtrans
    public function getTransactionDetails()
    {

        // Lakukan sesuatu dengan $transactions, seperti menampilkan data dalam view atau melakukan operasi lainnya


        // Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // Config::$is3ds = env('MIDTRANS_IS_3DS');
        // $transactions = Transaction::status($transactionID);
        // return view('kasir.transaksiEwallet', ['transactions' => $transactions]);  
    }
}

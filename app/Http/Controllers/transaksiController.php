<?php

namespace App\Http\Controllers;

use App\Models\orderCard;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index()
    {
        $daftarOrders = orderCard::get();
        return view("kasir.transaksi", compact("daftarOrders"));
    }
    public function print()
    {
        return view("kasir.cetakOrder");
    }
    public function destroy(Request $request)
    {
        $daftarOrder = orderCard::find($request->id_DaftarOrder);
        $daftarOrder->delete();
        return back()->with('success', 'Orderan berhasil di Cencel');
    }
}

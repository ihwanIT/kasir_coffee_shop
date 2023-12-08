<?php

namespace App\Http\Controllers;

use App\Models\orderCard;
use Illuminate\Http\Request;

class OrderCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil data yang dikirim dari JavaScript
        $dataMenu = $request->input('menu');
        $jumlah = $request->input('jumlah');
        $subHarga = $request->input('sub_harga');
        $totalHarga = $request->input('total_harga');
        $keterangan = $request->input('keterangan');

        // $randomId = mt_rand(100000, 999999);

        $daftarOrder = orderCard::create([
            'menu' => $dataMenu,
            'jumlah' => $jumlah,
            'sub_harga' => $subHarga,
            'total_harga' =>$totalHarga,
            'keterangan' => $keterangan
        ]);
        return back()->with('success', 'Order berhasil ditambah !');
    }

    /**
     * Display the specified resource.
     */
    public function show(orderCard $orderCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orderCard $orderCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orderCard $orderCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orderCard $orderCard)
    {
        //
    }
}

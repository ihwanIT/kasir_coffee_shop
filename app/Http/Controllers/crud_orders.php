<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\kasir\menu;

class crud_orders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = menu::all();
        return view('kasir.orders', [
            'menus' => [''],
            'orders' => order::latest()->filter(request(['search']))->paginate(10)
        ]);
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
        $randomId = mt_rand(100000, 999999);

        $orders = new order();
        $orders->id = $randomId;
        $orders->nama_pembeli = $request->input('name_costumer');
        $orders->nama_orderan = $request->input('pesanan');
        $orders->keterangan = $request->input('keterangan');
        $orders->jumlah = $request->input('jumlah');
        $orders->save();
        return redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = order::findOrFail($request->id_menu);
        $menu->update($request->all());
        return back()->with('success' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $menu = order::find($request->id_menu);
        $menu->delete();
        return back()->with('success' , 'success');
    }
}

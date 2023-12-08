<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;

class crudStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasir.persediaan', [
            'stoks' => stok::latest()->filter(request(['search_stoks']))->paginate(10)
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

        $stoks = new stok();
        $stoks->id = $randomId;
        $stoks->bahan_baku = $request->input('bahan_baku');
        $stoks->jumlah_stok = $request->input('jumlah_stok');
        $stoks->satuan_pengukuran = $request->input('satuan_pengukuran');
        $stoks->jumlah_cup = $request->input('jumlah_cup');
        $stoks->supplier = $request->input('supplier');
        $stoks->harga_beli = $request->input('harga_beli');
        $stoks->keterangan = $request->input('keterangan');
        $stoks->save();
        return redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $stok = stok::findOrFail($request->stok_id);
        $stok->update($request->all());
        return back()->with('success' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $stok = stok::find($request->stok_id);
        $stok->delete();
        return back()->with('success' , 'success');
    }
}

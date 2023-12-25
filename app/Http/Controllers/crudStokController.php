<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;

class crudStokController extends Controller
{
    public function index()
    {
        return view('kasir.persediaan', [
            'stoks' => stok::latest()->filter(request(['search_stoks']))->paginate(10)
        ]);
    }
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
    public function update(Request $request)
    {
        $stok = stok::findOrFail($request->stok_id);
        $stok->update($request->all());
        return back()->with('success' , 'success');
    }
    public function destroy(Request $request)
    {
        $stok = stok::find($request->stok_id);
        $stok->delete();
        return back()->with('success' , 'success');
    }
}

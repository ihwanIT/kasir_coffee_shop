<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kasir\menu;

class crud_menu extends Controller
{
    public function index()
    {
        return view('kasir.menuProduk', [
            'menu' => menu::latest()->filter(request(['search']))->Paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'harga' => 'required',
            'jumlah' => 'required'
        ]);
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('menu-images');
        }
        $menu = menu::create($validateData);

        if ($menu) {
            return back()->with('success', 'Data berhasil disimpan.');
        } else {
            return back()->withErrors('Gagal menyimpan data. Silakan coba lagi.');
        }
    }
    public function update(Request $request)
    {
        $menu = menu::findOrFail($request->id_menu);
        $menu->update($request->all());
        return back()->with('success', 'success');
    }
    public function destroy(Request $request)
    {
        $menu = menu::find($request->id_menu);
        $menu->delete();
        return back()->with('success', 'success');
    }
}

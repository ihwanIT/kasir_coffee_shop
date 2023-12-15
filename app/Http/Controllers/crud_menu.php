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
    // public function store(Request $request)
    // {

    //     $randomId = mt_rand(100000, 999999);
    //     $menus = new menu();
    //     $menus->id = $randomId;
    //     $menus->nama = $request->input('nama');
    //     $menus->image = $request->file('image')->store('menu-image');
    //     $menus->kategori = $request->input('kategori');
    //     $menus->harga = $request->input('harga');
    //     $menus->jumlah = $request->input('jumlah');
    //     $menus->save();
    //     return redirect()->back()->with('success', 'success');
    // // }
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

    // public function store(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'nama' => 'required',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'kategori' => 'required',
    //         'harga' => 'required',
    //         'jumlah' => 'required'
    //     ]);

    //     if ($request->file('image')) {
    //         $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    //         $path = $request->file('image')->storeAs('menu-image', $imageName, 'public'); // Ganti 'menu-images' dengan folder yang diinginkan

    //         $validateData['image'] = $path;
    //     }

    //     $menu = Menu::create($validateData);

    //     if ($menu) {
    //         return back()->with('success', 'Data berhasil disimpan.');
    //     } else {
    //         return back()->withErrors('Gagal menyimpan data. Silakan coba lagi.');
    //     }
    // }

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use GuzzleHttp\Promise\Create;

class crud_menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = menu::all();
        return view('kasir.menuProduk', ['menu' => $menus]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $data = (
        //     [
        //         'nama' =>$request->input('nama'),
        //         'kategori' =>$request->input('kategori'),
        //         'harga' =>$request->input('harga'),
        //     ]
        //     );
        //     $datas = menu::created($data);
        // return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menus = new menu();
        $menus->nama = $request->input('nama');
        $menus->kategori = $request->input('kategori');
        $menus->harga = $request->input('harga');
        $menus->save();
        return redirect('/MenuProduk')->with('success','success');
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
    public function edit(string $id_menu)
    {
        $menu = menu::find($id_menu);
        return view('', ['menus'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_menu)
    {
        $menu = menu::find($id_menu);
        $menu->nama = $request->input('nama');
        $menu->kategori = $request->input('kategori');
        $menu->harga = $request->input('harga');
        $menu->save();
        return redirect('/MenuProduk')->with('success' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_menu)
    {
        $menu = menu::find($id_menu);
        $menu->delete();
        return redirect('/MenuProduk')->with('success','success');

    }
}

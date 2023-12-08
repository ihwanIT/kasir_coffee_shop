<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kasir\menu;
use GuzzleHttp\Promise\Create;
use illuminate\support\Str;

class crud_menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request('search'));
        // $datamenu = menu::latest();

        return view('kasir.menuProduk', [
            'menu' => menu::latest()->filter(request(['search']))->Paginate(10)
        ]);

        // return back()->withErrors(['error' => 'error']);
 
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
        $randomId = mt_rand(100000, 999999);

        $menus = new menu();
        $menus->id = $randomId;
        $menus->nama = $request->input('nama');
        $menus->kategori = $request->input('kategori');
        $menus->harga = $request->input('harga');
        $menus->jumlah = $request->input('jumlah');
        $menus->save();
        return redirect()->back()->with('success','success');
        // return redirect()->route('crud_menu.index')->with('success','success');
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
    // public function edit(string $id_menu)
    // {
    //     $DataMenu = menu::find($id_menu);
    //     return view('crud_menu.edit', compact('DataMenu'));
    // }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $menu = menu::findOrFail($request->id_menu);
        $menu->update($request->all());
        return back()->with('success' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $menu = menu::find($request->id_menu);
        $menu->delete();
        return back()->with('success' , 'success');

    }
}

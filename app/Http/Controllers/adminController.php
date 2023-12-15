<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = user::all();
        return view("kasir.admin", compact("admins"));
        
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
    // public function store(Request $request)
    // {
    //     return  $request->file('image_admin')->store('menu-image');
    //     $randomId = mt_rand(100000, 999999);

    //     $menus = new user();
    //     $menus->id = $randomId;
    //     $menus->nama = $request->input('nama');
    //     $menus->email = $request->input('email');
    //     $menus->username = $request->input('username');
    //     $menus->password = $request->input('password');
    //     $menus->image = $request->file('image_admin')->store('menu-image');
    //     $menus->save();
    //     return redirect()->back()->with('success','success');
    // }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email',
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('admin-images');
        }
        $user = User::create($validateData);

        if ($user) {
            return back()->with('success', 'Data berhasil disimpan.');
        } else {
            return back()->withErrors('Gagal menyimpan data. Silakan coba lagi.');
        }
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
    public function update(Request $request)
    {
        $admin = user::findOrFail($request->id_admin);
        $admin->update($request->all());
        return back()->with('succes', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $admin = user::findOrFail($request->id_admin);
        $admin->delete();
        return back()->with('succes', 'data berhasil di update');
    }
}

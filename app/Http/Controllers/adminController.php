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
    public function store(Request $request)
    {
        $randomId = mt_rand(100000, 999999);

        $menus = new user();
        $menus->id = $randomId;
        $menus->nama = $request->input('nama');
        $menus->email = $request->input('email');
        $menus->username = $request->input('username');
        $menus->password = $request->input('password');
        $menus->save();
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

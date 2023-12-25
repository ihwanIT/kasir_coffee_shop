<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function index()
    {
        $admins = user::all();
        return view("kasir.admin", compact("admins"));
        
    }
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
    public function update(Request $request)
    {
        $admin = user::findOrFail($request->id_admin);
        $admin->update($request->all());
        return back()->with('succes', 'data berhasil di update');
    }
    public function destroy(Request $request)
    {
        $admin = user::findOrFail($request->id_admin);
        $admin->delete();
        return back()->with('succes', 'data berhasil di update');
    }
}

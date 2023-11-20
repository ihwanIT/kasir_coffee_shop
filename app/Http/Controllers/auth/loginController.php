<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class loginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
            $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            ];
        if(Auth::Attempt($data)){
            return redirect()->route('kasir.dashboard');
        }
        return back()->withErrors(['error' => 'error']);
    }
}

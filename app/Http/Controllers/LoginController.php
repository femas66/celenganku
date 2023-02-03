<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }
    public function store(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        }
        else {
            return back()->with('error', 'Email/password salah');
        }
    }
    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login')->with('msg', 'Berhasil logout');
    }
}

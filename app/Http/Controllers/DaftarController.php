<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function index() {
        return view('daftar');
    }
    public function store(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password'))
        ];
        User::create($data);
        return redirect()->route('login');
    }
}

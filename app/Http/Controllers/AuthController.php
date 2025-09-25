<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.register');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function dashboard()
{
    if (!Auth::guard('user_record')->check()) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    return view('dashboard');
}

    public function store(AuthRequest $request)
    {
        DB::table('user_records')->insert([
            'name'       => $request->name,
            'username'   => $request->username,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => Hash::make($request->password), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login')->with('success', 'User created successfully.');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('user_record')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Invalid credentials');
}


    public function logout()
    {
        Auth::guard('user_record')->logout();
        
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
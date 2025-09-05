<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AuthRequest;


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

    public function store(AuthRequest $request)
    {
        DB::table('user_records')->insert([
            'name'       => $request->name,
            'username'   => $request->username,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => $request->password, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login')->with('success', 'User created successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('user_records')->where('email', $request->email)->first();

        if ($user && $request->password === $user->password) {
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            return redirect('/home');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:user_records,username',
            'email' => 'required|email|unique:user_records,email',
            'phone' => 'nullable|string|max:14|unique:user_records,phone',
            'password' => 'required|min:6|confirmed',
        ],
    
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name may not be greater than 50 characters',
            'name.min' => 'Name must be at least 2 characters',
            'username.required' => 'Username is required',
            'username.string' => 'Username must be a string',
            'username.max' => 'Username may not be greater than 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'phone.max' => 'Phone number may not be greater than 14 characters',
            'password.min' => 'Password must be at least 6 characters',
            
        ]);


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

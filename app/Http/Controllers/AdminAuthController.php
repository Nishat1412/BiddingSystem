<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.admin_login'); // Blade file
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // fetch from admin_panel table
        $admin = DB::table('admin_panel')->where('email', $request->email)->first();

        if ($admin && $request->password === $admin->password) {
            Session::put('admin_id', $admin->id);
            Session::put('admin_email', $admin->email);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        return view('admin.admin_panel'); // dashboard page
    }
}

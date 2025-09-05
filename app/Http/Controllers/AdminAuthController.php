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

        public function showAdminRegister()
    {
        return view('admin.adminregister'); // create this blade file
    }

    public function storeAdmin(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:admin_panel,email',
        'password' => 'required|min:6|confirmed',
    ]);

    DB::table('admin_panel')->insert([
        'email' => $request->email,
        'password' => $request->password, // plain text for visibility
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'New admin registered successfully.');
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

        return view('admin.dashboard'); // dashboard page
    }
}

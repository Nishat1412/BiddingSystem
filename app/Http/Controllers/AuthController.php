<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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

    return view('user.dashboard');
}

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('user_record')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('user.dashboard');
    }

    return back()->with('error', 'Invalid credentials');
}


    public function logout()
    {
        Auth::guard('user_record')->logout();
        
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

        public function store(AuthRequest $request)
    {
        session([
        'pending_user' => $request->only([
            'name','username','email','phone','password'
        ])
    ]);

    
    return redirect()->route('upload.form')
                     ->with('success', 'Please upload your documents to complete registration.');
    }

    public function showUploadForm()
{
    if (!session()->has('pending_user')) {
        return redirect()->route('register')
            ->with('error', 'Please fill in your details first.');
    }

    return view('auth.upload-documents');
}

public function handleUpload(Request $request)
{
    if (!session()->has('pending_user')) {
        return redirect()->route('register')->with('error', 'Session expired. Try again.');
    }

    $request->validate([
        'identity_card' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'birth_certificate_or_passport' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $pending = session('pending_user');

    DB::transaction(function () use ($pending, $request) {

        $userId = DB::table('user_records')->insertGetId([
            'name'       => $pending['name'],
            'username'   => $pending['username'],
            'email'      => $pending['email'],
            'phone'      => $pending['phone'],
            'password'   => Hash::make($pending['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $nidFile = $request->file('identity_card');
        $nidFilename = time() . '_nid_' . $nidFile->getClientOriginalName();
        $nidFile->storeAs('', $nidFilename, 'identity');
        $nidPath = $nidFilename;

        $docFile = $request->file('birth_certificate_or_passport');
        $docFilename = time() . '_doc_' . $docFile->getClientOriginalName();
        $docFile->storeAs('', $docFilename, 'documents');
        $docPath = $docFilename;

        DB::table('document_submissions')->insert([
            'user_id' => $userId,
            'identity_card' => $nidPath,
            'birth_certificate_or_passport' => $docPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    });

    session()->forget('pending_user');

    return redirect()->route('login')->with('success', 'Registration complete. You may now log in.');
}

}
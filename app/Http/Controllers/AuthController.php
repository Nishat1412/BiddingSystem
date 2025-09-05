<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\SignUp;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    

     public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:14',
            'password' => 'required|string|min:8|confirmed',
            
        ],
    
        [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name may not be greater than 255 characters',
            'name.min' => 'Name must be at least 2 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email may not be greater than 255 characters',
            'password.min' => 'Password must be at least 8 characters',
            
        ]);

        DB::table('user_records')->insert([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            
            
        ]);
        dd('Student created successfully');
    }
    
}

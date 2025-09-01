<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRecordController;
use App\Http\Controllers\ProductController;

Route::get('/user-records', [UserRecordController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }
    return view('home'); 
});

Route::get('/app', function () {
    return view('app'); 
});

Route::get('/home', function () {
    return view('home'); 
});

Route::get('/gadgets', function () {
    return view('gadgets');
});

Route::get('/feature2', function () {
    return view('feature2');
});


Route::get('/bidding', function () {
    return view('bidding');
});
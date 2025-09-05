<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRecordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;


Route::get('/user-records', [UserRecordController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.create');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

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
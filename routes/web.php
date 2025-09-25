<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRecordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

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

Route::get('/admin/register', [AdminAuthController::class, 'showAdminRegister'])->name('adminregister.create');
Route::post('/admin/register', [AdminAuthController::class, 'storeAdmin'])->name('adminregister.store');


Route::get('/app', function () {
    return view('app'); 
});

Route::get('/home', function () {
    return view('home'); 
});



//Route::post('/admin/products/store', [ProductController::class, 'store'])
   // ->name('admin.products.store');


Route::get('/products/gadgets', [ProductController::class, 'gadget'])->name('products.gadgets');
Route::get('/products/artwork', [ProductController::class, 'artwork'])->name('products.artwork');
Route::get('/products/antiques', [ProductController::class, 'antique'])->name('products.antiques');
Route::get('/products/memorabilia', [ProductController::class, 'memorabilia'])->name('products.memorabilia');
Route::get('/products/automobiles', [ProductController::class, 'automobile'])->name('products.automobiles');



// Show all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::middleware(['auth:user_record'])->group(function(){
// Create new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Edit product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Delete product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{id}/upload-documents', [ProductController::class, 'uploadDocumentsForm'])->name('products.uploadDocuments');
Route::post('/products/{id}/upload-documents', [ProductController::class, 'storeDocuments'])->name('products.storeDocuments');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRecordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuctionController;


Route::get('/app', function () {
    return view('app'); 
});

Route::get('/home', function () {
    return view('user.home'); 
});

Route::get('/howitworks', function () {
    return view('user.howitworks'); 
});

Route::get('/legal', function () {
    return view('user.legal'); 
});

Route::get('/help', function () {
    return view('user.help'); 
});

Route::get('/about', function () {
    return view('user.about'); 
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.create');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/upload-documents', [AuthController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload-documents', [AuthController::class, 'handleUpload'])->name('upload.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');



Route::middleware(['auth:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::post('/admin/products/{id}/auction-action', [AdminAuthController::class,'auctionAction'])->name('admin.auctionAction');
    
    Route::get('/admin/pending-auctions', [AdminAuthController::class, 'pendingAuctions'])->name('admin.pendingAuctions');

    Route::get('/admin/product-pdf/{id}', [AdminAuthController::class, 'productPdf'])->name('admin.productPdf');   

    Route::get('/admin/document-pdf/{type}/{user_id}', [AdminAuthController::class, 'generateDocumentPdf'])->name('admin.generateDocumentPdf') ;
    
    Route::post('/admin/approve-product/{id}', [AuctionController::class, 'approveProduct'])->name('approve.product');

    //Route::post('/auctions/start-all/{category}', [AuctionController::class, 'startAll'])->name('auctions.startAll');
    Route::post('/auctions/start/{productId}', [AuctionController::class, 'startSingle'])->name('auctions.startSingle');

    Route::get('/bids', [AuctionController::class, 'allBids'])->name('bids.index');

});


Route::get('/auctions', [AuctionController::class, 'index'])->name('auctions.index');
Route::get('/auctions/gadgets',        [AuctionController::class,'gadgets'])->name('auctions.gadgets');
Route::get('/auctions/artwork',        [AuctionController::class,'artwork'])->name('auctions.artwork');
Route::get('/auctions/antiques',       [AuctionController::class,'antiques'])->name('auctions.antiques');
Route::get('/auctions/memorabilia',    [AuctionController::class,'memorabilia'])->name('auctions.memorabilia');
Route::get('/auctions/automobiles',    [AuctionController::class,'automobiles'])->name('auctions.automobiles');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/gadgets', [ProductController::class, 'gadget'])->name('products.gadgets');
Route::get('/products/artwork', [ProductController::class, 'artwork'])->name('products.artwork');
Route::get('/products/antiques', [ProductController::class, 'antique'])->name('products.antiques');
Route::get('/products/memorabilia', [ProductController::class, 'memorabilia'])->name('products.memorabilia');
Route::get('/products/automobiles', [ProductController::class, 'automobile'])->name('products.automobiles');


Route::middleware(['auth:user_record'])->group(function(){

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/products/{id}/request-auction', [ProductController::class,'requestAuction'])->name('products.requestAuction');

Route::post('/auctions/place-bid', [AuctionController::class, 'placeBid'])->name('auctions.placeBid');

Route::get('/auctions/{productId}/history', [AuctionController::class, 'bidHistory'])->name('auctions.bidHistory');


});





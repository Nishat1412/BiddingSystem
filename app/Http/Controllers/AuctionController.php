<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuctionController extends Controller
{
    private function updateExpiredAuctions()
    {
        $now = now();
        DB::table('auctions')
            ->where('status', 'active')
            ->where('end_time', '<', $now)
            ->update(['status' => 'finished']);
    }

    public function index()
    {
        $this->updateExpiredAuctions();

        $products = DB::table('products')
            ->where('auction_status', 'approved')
            ->get();

        return view('auctions.index', compact('products'));
    }

      private function categoryView(string $category)
{
    $this->updateExpiredAuctions();

    $products = DB::table('products')
            ->where('products.auction_status', 'approved')
            ->whereRaw('LOWER(products.category) = ?', [strtolower($category)])
            ->leftJoin('auctions', function ($join) {
                $join->on('products.id', '=', 'auctions.product_id')
                    ->where('auctions.status', '=', 'finished');
            })
            ->whereNull('auctions.id')
            ->select('products.*')
            ->get();

        $activeAuctionDetails = null;
    $auction = DB::table('auctions')
        ->where('category', $category)
        ->whereIn('status', ['pending', 'active'])
        ->orderBy('start_time', 'desc')
        ->first();

    return view('auctions.category', [
        'products' => $products,
        'category' => $category,
        'auction'  => $auction,
    ]);
}

    public function gadgets()     { return $this->categoryView('Gadgets'); }
    public function artwork()     { return $this->categoryView('Artwork'); }
    public function antiques()    { return $this->categoryView('Antiques'); }
    public function memorabilia() { return $this->categoryView('Memorabilia'); }
    public function automobiles() { return $this->categoryView('Automobiles'); }

public function startAll(Request $request, $category)
{
    $request->validate([
        'start_time' => 'required|date',
        'end_time'   => 'required|date|after:start_time',
    ]);

    $start = Carbon::parse($request->input('start_time'))->format('Y-m-d H:i:s');
    $end   = Carbon::parse($request->input('end_time'))->format('Y-m-d H:i:s');

    
    $products = DB::table('products')
        ->select('id', 'product_price', 'category') 
        ->whereRaw('LOWER(category) = ?', [strtolower($category)])
        ->where('auction_status', 'approved')
        ->get();

    if ($products->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No approved products found'
        ]);
    }

    $now = now();

    foreach ($products as $product) {
        $exists = DB::table('auctions')
            ->where('product_id', $product->id)
            ->exists();

        if (!$exists) {
            DB::table('auctions')->insert([
                'product_id'     => $product->id,
                'starting_price' => $product->product_price,
                'current_bid'    => $product->product_price,
                'start_time'     => $start,
                'end_time'       => $end,
                'status'         => 'active',
                'category'       => $product->category, 
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
        }
    }

    return response()->json([
        'success' => true,
        'message' => 'Auctions started successfully!'
    ]);
}

}

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

    $expiredAuctions = DB::table('auctions')
        ->where('status', 'active')
        ->where('end_time', '<', $now)
        ->get();

    foreach ($expiredAuctions as $auction) {
        $highestBid = DB::table('bids')
            ->where('auction_id', $auction->id)
            ->orderBy('bid_amount', 'desc')
            ->first();

        if ($highestBid) {
            DB::table('auctions')
                ->where('id', $auction->id)
                ->update([
                    'status'      => 'finished',
                    'winner_id'   => $highestBid->user_record_id,
                    'current_bid' => $highestBid->bid_amount,
                    'updated_at'  => $now,
                ]);
        } else {
            DB::table('auctions')
                ->where('id', $auction->id)
                ->update([
                    'status'     => 'finished',
                    'updated_at' => $now,
                ]);
        }
    }
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

            $productIds = $products->pluck('id')->toArray();

            $highestBids = DB::table('bids')
                ->whereIn('product_id', $productIds)
                ->select('product_id', DB::raw('MAX(bid_amount) as highest_bid'))
                ->groupBy('product_id')
                ->pluck('highest_bid', 'product_id');

            foreach ($products as $product) {
                $product->current_bid = $highestBids[$product->id] ?? $product->starting_price ?? $product->product_price;
            }

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
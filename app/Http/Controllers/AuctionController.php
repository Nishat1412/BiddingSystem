<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductAuctionStartedMail;
use App\Mail\AuctionWinnerMail;
use App\Mail\ProductSoldMail;
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

            $winner  = DB::table('user_records')->where('id', $highestBid->user_record_id)->first();
            $product = DB::table('products')->where('id', $auction->product_id)->first();
            $owner   = DB::table('user_records')->where('id', $product->user_id)->first();

            if ($winner && $product && $owner) {
                Mail::to($winner->email)->send(new AuctionWinnerMail($product, $winner, $auction, $owner));
                Mail::to($owner->email)->send(new ProductSoldMail($product, $winner, $auction));
            }

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
        ->leftJoin('auctions', 'products.id', '=', 'auctions.product_id')
        ->where('products.auction_status', 'approved')
        ->whereRaw('LOWER(products.category) = ?', [strtolower($category)])
        ->where(function ($query) {
            $query->where('auctions.status', '!=', 'finished')
                  ->orWhereNull('auctions.status');
        })
        ->select(
            'products.*',
            'auctions.start_time',
            'auctions.end_time',
            'auctions.status as auction_status',
            'auctions.current_bid',
            'auctions.starting_price'
        )
        ->get();

    $productIds = $products->pluck('id')->toArray();

    $highestBids = DB::table('bids')
        ->whereIn('product_id', $productIds)
        ->select('product_id', DB::raw('MAX(bid_amount) as highest_bid'))
        ->groupBy('product_id')
        ->pluck('highest_bid', 'product_id');

    foreach ($products as $product) {
        $product->current_bid = $highestBids[$product->id]
            ?? $product->current_bid
            ?? $product->starting_price
            ?? $product->product_price;
    }

    $activeAuctionDetails = DB::table('auctions')
        ->where('category', $category)
        ->whereIn('status', ['pending', 'active'])
        ->orderBy('start_time', 'desc')
        ->first();

    return view('auctions.category', [
        'products' => $products,
        'category' => $category,
        'auction'  => $activeAuctionDetails,
    ]);
}


    public function gadgets()     { return $this->categoryView('Gadgets'); }
    public function artwork()     { return $this->categoryView('Artwork'); }
    public function antiques()    { return $this->categoryView('Antiques'); }
    public function memorabilia() { return $this->categoryView('Memorabilia'); }
    public function automobiles() { return $this->categoryView('Automobiles'); }

public function startSingle(Request $request, $productId)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
        ]);

        $now = now();
        $start = Carbon::parse($request->input('start_time'))->format('Y-m-d H:i:s');
        $end   = Carbon::parse($request->input('end_time'))->format('Y-m-d H:i:s');

        $product = DB::table('products')->where('id', $productId)->first();

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }

        $existing = DB::table('auctions')->where('product_id', $productId)->first();
        if ($existing) {
            return response()->json(['success' => false, 'message' => 'Auction already exists for this product.'], 409);
        }

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

        $owner = DB::table('user_records')->where('id', $product->user_id)->first();
        if ($owner && $owner->email) {
            Mail::to($owner->email)->send(new ProductAuctionStartedMail($product, $owner));
        }

        return response()->json(['success' => true, 'message' => 'Auction started successfully.']);
    }


public function placeBid(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'bid_amount' => 'required|numeric|min:0.01',
    ]);

    $productId = $request->input('product_id');

   
    $auction = DB::table('auctions')
        ->where('product_id', $productId)
        ->whereIn('status', ['pending', 'active'])
        ->first();

    if (!$auction) {
        return back()->with('error', 'No active auction found for this product.');
    }


    DB::table('bids')->insert([
        'auction_id'      => $auction->id,        
        'product_id'      => $productId,
        'user_record_id'  => auth()->id(),
        'bid_amount'      => $request->bid_amount,
        'created_at'      => now(),
    ]);

   
    DB::table('auctions')->where('id', $auction->id)
        ->update(['current_bid' => $request->bid_amount]);

    return back()->with('success', 'Bid placed successfully!');
}

public function bidHistory($productId)
{
    try {
        $bids = DB::table('bids')
            ->join('user_records', 'bids.user_record_id', '=', 'user_records.id') 
            ->where('bids.product_id', $productId)
            ->select('bids.user_record_id as user_id', 'user_records.username', 'bids.bid_amount')
            ->orderBy('bids.created_at', 'desc')
            ->get();

        return response()->json($bids);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Failed to fetch bid history',
            'message' => $e->getMessage()
        ], 500);
    }
}

public function allBids()
{
    $bids = DB::table('bids')
        ->join('user_records', 'bids.user_record_id', '=', 'user_records.id')
        ->join('products', 'bids.product_id', '=', 'products.id')
        ->select(
            'bids.id',
            'bids.auction_id',
            'bids.product_id',
            'products.product_name',
            'bids.user_record_id',
            'user_records.username',
            'bids.bid_amount',
            'bids.created_at'
        )
        ->orderBy('bids.created_at', 'asc')
        ->paginate(20);

    return view('auctions.bid-history', compact('bids'));
}


}
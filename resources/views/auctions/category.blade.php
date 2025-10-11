@extends('admin.adminlayout')
@section('title') {{ $category }} Auctions @endsection
@section('content')

<div class="container">
    <h3 class="mb-4 text-center text-capitalize">{{ $category }} Auctions</h3>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">

               
                <button class="btn btn-sm quick-view-btn position-absolute"
                        style="top:10px; right:10px;"
                        data-toggle="modal"
                        data-target="#productModal"
                        data-name="{{ $product->product_name }}"
                        data-price="${{ number_format($product->product_price, 2) }}"
                        data-description="{{ $product->product_description }}"
                        data-rating="{{ $product->product_rating }}"
                        data-image="{{ asset('uploads/' . $product->product_image) }}">
                    <i class="fas fa-eye"></i>
                </button>

                <img src="{{ asset('uploads/' . $product->product_image) }}" 
                     class="card-img-top" 
                     alt="{{ $product->product_name }}">

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">Current bid: ${{ number_format($product->current_bid ?? $product->product_price, 2) }}</p>

                    {{-- Countdown for active auction --}}
                  @if($product->auction_status === 'active' && $product->start_time && $product->end_time)
                        <p class="mb-1">Start Time: {{ \Carbon\Carbon::parse($product->start_time)->format('d M Y, H:i') }}</p>
                        <p class="mb-1">End Time: {{ \Carbon\Carbon::parse($product->end_time)->format('d M Y, H:i') }}</p>
                        <div class="mt-2 text-danger font-weight-bold countdown-timer"
                         data-start="{{ $product->start_time }}"
                         data-end="{{ $product->end_time }}"
                         data-product-id="{{ $product->id }}">
                         <span class="countdown-label"> Ends in: </span>
                         <span class="time-left"></span>
                    </div>
                    @endif

                    {{-- Admin-only Start Auction Button --}}
                    @auth('admin')
                    @if(!$product->auction_status)
                    <div class="text-center mt-3">
                        <button class="btn btn-success btn-sm" 
                                data-toggle="modal" 
                                data-target="#startAuctionModal-{{ $product->id }}">
                            <i class="fas fa-play-circle"></i> Start Auction
                        </button>
                    </div>
                    @endif
                    @endauth

                    @guest('admin')
                    <div class="d-flex justify-content-around mt-3">
                        @auth('user_record')
                            @if($product->auction_status === 'active' && $product->start_time && $product->end_time && \Carbon\Carbon::now()->gte($product->start_time))
                                
                                @if($product->user_id != auth('user_record')->id())
                                    <button class="btn btn-primary btn-sm"
                                            data-toggle="modal" 
                                            data-target="#bidNowModal"
                                            data-product-id="{{ $product->id }}"
                                            data-product-name="{{ $product->product_name }}"
                                            data-current-bid="{{ $product->current_bid ?? $product->product_price }}">
                                        <i class="fas fa-gavel"></i> Bid Now
                                    </button>
                                @else
                                    <span class="text-muted">Your Product</span>
                                @endif

                                <button class="btn btn-info btn-sm" 
                                        data-toggle="modal" 
                                        data-target="#bidHistoryModal"
                                        data-product-id="{{ $product->id }}">
                                    <i class="fas fa-history"></i> History
                                </button>

                            @else
                                <span class="text-muted">Auction yet to start</span>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-gavel"></i> Bid Now
                            </a>
                        @endauth
                    </div>
                @endguest
            </div>
        </div>
    </div>

        {{-- Start Auction Modal per product --}}
        @auth('admin')
        <div class="modal fade" id="startAuctionModal-{{ $product->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('auctions.startSingle', ['productId' => $product->id]) }}" class="startAuctionForm">
                    @csrf
                    <div class="modal-content p-3">
                        <h4 class="mb-3">Start Auction for {{ $product->product_name }}</h4>

                        <div class="form-group">
                            <label>Start Date & Time</label>
                            <input type="datetime-local" name="start_time" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>End Date & Time</label>
                            <input type="datetime-local" name="end_time" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">Start Auction</button>
                    </div>
                </form>
            </div>
        </div>
        @endauth
        @endforeach
    </div>
</div>

{{-- Bid Modals --}}
@auth('user_record')
<div class="modal fade" id="bidNowModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form id="bidNowForm" method="POST" action="{{ route('auctions.placeBid') }}">
            @csrf
            <input type="hidden" name="product_id" id="bidProductId">
            <div class="modal-content p-4">
                <h5 class="modal-title mb-3" id="bidProductName">Place Your Bid</h5>
                <div class="form-group">
                    <label>Bid Amount ($)</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="bid_amount" id="bidAmount" required>
                </div>
                <button type="submit" class="btn btn-success mt-2">Submit Bid</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="bidHistoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content p-4">
            <h5 class="modal-title mb-3">Bid History</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Bid Amount ($)</th>
                    </tr>
                </thead>
                <tbody id="bidHistoryBody"></tbody>
            </table>
        </div>
    </div>
</div>
@endauth

{{-- Quick View Modal --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-4 text-center">
            <img src="" class="modal-img mb-3" style="max-width:100%;height:auto;">
            <h4 class="modal-title mb-2"></h4>
            <p class="mb-1">Rating: <span class="modal-rating"></span> ⭐</p>
            <p class="modal-description mb-2"></p>
            <h5 class="modal-price mb-3"></h5>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/auction.js') }}"></script>
<script src="{{ asset('js/userbid.js') }}"></script>

@endsection
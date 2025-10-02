@extends('admin.adminlayout')
@section('title') {{$category}} Auctions @endsection
@section('content')

{{-- Auction Countdown --}}
<div id="auction-info" class="text-center my-3" @if(!$auction) style="display:none;" @endif>
    @if($auction)
        <h4>
            Auction Starting:
            <span id="auction-start">{{ $auction->start_time }}</span><br>
            Auction Ending:
            <span id="auction-end">{{ $auction->end_time }}</span>
        </h4>
        <h5 id="auction-countdown" class="mt-2 text-danger font-weight-bold"></h5>
    @endif
</div>


<div class="container">

    @auth('admin')
    {{-- Start Auction Button --}}
    <div class="text-center mb-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#startAuctionModal">
            Start Auction
        </button>
    </div>
    @endauth
    <h3 class="mb-4 text-center text-capitalize">{{ $category }} Auctions</h3>

    {{-- Products Grid --}}
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

                <img src="{{ asset('uploads/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">

             <div class="card-body text-center">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text"><p class="card-text">Current bid: ${{ number_format($product->current_bid, 2) }}</p>
                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


{{-- Start Auction Modal --}}
<div class="modal fade" id="startAuctionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="{{ route('auctions.startAll', ['category' => strtolower($category)]) }}" id="startAuctionForm">
            @csrf
            <div class="modal-content p-3">
                <h4 class="mb-3">Set Date & Time</h4>

                <div class="form-group">
                    <label>Start Date & Time</label>
                    <input type="datetime-local" name="start_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>End Date & Time</label>
                    <input type="datetime-local" name="end_time" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success mt-2">Set Date & Time</button>
            </div>
        </form>
    </div>
</div>


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


@endsection
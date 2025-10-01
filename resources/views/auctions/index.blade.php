@extends('admin.adminlayout')
@section('content')

<div class="container">
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#startAuctionModal">
        Start Auction
    </button>

<!-- Start Auction Modal -->
<div class="modal fade" id="startAuctionModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="startAuctionForm">
        @csrf
        <div class="modal-content p-3">
            <h4 class="mb-3">Set Start & End Time</h4>
            <input type="hidden" name="auction_id" id="auction_id">
            <div class="form-group">
                <label>Start Date & Time</label>
                <input type="datetime-local" name="start_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label>End Date & Time</label>
                <input type="datetime-local" name="end_time" class="form-control" required>
            </div>
            <button class="btn btn-success mt-2">Start Auction</button>
        </div>
    </form>
  </div>
</div>

<div class="container auction-section">
    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">

                {{-- Quick View Button --}}
                <button class="btn btn-sm quick-view-btn"
                        data-toggle="modal"
                        data-target="#productModal"
                        data-name="{{ $product->product_name }}"
                        data-price="${{ $product->product_price }}"
                        data-description="{{ $product->product_description }}"
                        data-rating="{{ $product->product_rating }}"
                        data-image="{{ asset('uploads/' . $product->product_image) }}"
                        aria-label="Quick view {{ $product->product_name }}">
                    <i class="fas fa-eye mr-1"></i>
                </button>

                {{-- Product Image --}}
                <img src="{{ asset('uploads/' . $product->product_image) }}"
                     alt="{{ $product->product_name }}"
                     class="card-img-top">

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">
                        Current bid: ${{ number_format($product->product_price, 2) }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Product Modal --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-4 text-center">
            <img src="" alt="" class="modal-img mb-3" style="max-width:100%;height:auto;">
            <h4 class="modal-title mb-2"></h4>
            <p class="mb-1">Rating: <span class="modal-rating"></span> ⭐</p>
            <p class="modal-description mb-2"></p>
            <h5 class="modal-price mb-3"></h5>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#productModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const modal  = $(this);

        // Lock page scroll
        const scrollY = window.scrollY;
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollY}px`;
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.width = '100%';

        // Populate modal fields
        modal.find('.modal-title').text(button.data('name'));
        modal.find('.modal-price').text(button.data('price'));
        modal.find('.modal-description').text(button.data('description'));
        modal.find('.modal-rating').text(button.data('rating'));
        modal.find('.modal-img').attr('src', button.data('image'));
    });
</script>
@endsection

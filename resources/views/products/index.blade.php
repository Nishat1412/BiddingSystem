@extends('user.app')
@section('title') All Products @endsection
@section('content1')


<div class="container auction-section">
  <h3 class="mb-4 text-center text-capitalize"> All Products</h3>
    <div class="row">


        @foreach($products as $product)
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">

                <!-- Quick View Button -->
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="{{ $product->product_name }}"
                    data-price="${{ $product->product_price }}"
                    data-description="{{ $product->product_description }}"
                    data-rating="{{ $product->product_rating }}"
                    data-image=  "{{ asset('uploads/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                      <i class="fas fa-eye mr-1"></i>
                </button>

                <!-- Product Image -->
                <img src="{{ asset('uploads/' . $product->product_image) }}" alt="{{ $product->product_name }}">


                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">Starting bid: ${{ $product->product_price }}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>

   
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-4 text-center">
      <img src="" alt="" class="modal-img mb-3" style="max-width: 100%; height: auto;">
      <h4 class="modal-title mb-2"></h4>
      <p class="mb-1">Rating: <span class="modal-rating"></span> ⭐</p>
      <p class="modal-description mb-2"></p>
      <h5 class="modal-price mb-3"></h5>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/product-modal.js') }}"></script>
@endsection


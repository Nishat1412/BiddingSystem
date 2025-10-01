<div class="container auction-section">
    <div class="row">

        @foreach($products as $product)
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">

                <!-- Quick View Button -->
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="{{ $product->product_name }}"
                    data-id="{{ $product->id }}"
                    data-price="${{ $product->product_price }}"
                    data-description="{{ $product->product_description }}"
                    data-rating="{{ $product->product_rating }}"
                    data-image=  "{{ asset('uploads/' . $product->product_image) }}" alt="{{ $product->product_name }}"
                    data-owner-id="{{ $product->user_id }}">               
                         <i class="fas fa-eye mr-1"></i>
                         
                </button>

                <!-- Product Image -->
                <img src="{{ asset('uploads/' . $product->product_image) }}" alt="{{ $product->product_name }}">


                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">Current bid: ${{ $product->product_price }}</p>

                    <!-- Edit/Delete Buttons -->
                     @if (Auth()->guard('user_record')->id() == $product->user_id)
                     <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> 
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>

    @auth('user_record')
    <a href="{{ route('products.create') }}" class="btn btn-success  add-product-btn">+ Add New Product</a>
    @endauth
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
     <button type="button" class="btn btn-bid request-auction">
    <i class="fas fa-gavel"></i> Add to Auction
    </button>
    </div>
  </div>
</div>
@extends('app')
@section('title') Gadgets @endsection
@section('content1')
<div class="container auction-section">
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
                    data-image="{{ $product->product_image ? Storage::url('products/'.$product->product_image) : asset('image/default.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>

                <!-- Product Image -->
                <img src="{{ asset('uploads/' . $product->product_image) }}" alt="{{ $product->product_name }}">


                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">Current bid: ${{ $product->product_price }}</p>

                    <!-- Edit/Delete Buttons -->
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <a href="{{ route('products.create') }}" class="btn btn-success mt-3">+ Add New Product</a>
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
      <a href="#" class="btn btn-bid">
    <i class="fas fa-gavel"></i> Add to Auction
</a>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
   var scrollY;

$('#productModal').on('show.bs.modal', function (event) {
    scrollY = window.scrollY;
    document.body.style.position = 'fixed';
    document.body.style.top = `-${scrollY}px`;
    document.body.style.left = '0';
    document.body.style.right = '0';
    document.body.style.width = '100%';

    var trigger = $(event.relatedTarget);
    var name = trigger.data('name');
    var price = trigger.data('price');
    var description = trigger.data('description');
    var rating = trigger.data('rating');
    var image = trigger.data('image');
    var id = trigger.data('id');

    var modal = $(this);
    modal.find('.modal-title').text(name);
    modal.find('.modal-price').text(price);
    modal.find('.modal-description').text(description);
    modal.find('.modal-rating').text(rating);
    modal.find('.modal-img').attr('src', image);

    modal.find('.btn-bid').attr('href', '/products/' + id + '/upload-documents');
});

$('#productModal').on('hidden.bs.modal', function () {
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.left = '';
    document.body.style.right = '';
    document.body.style.width = '';
    window.scrollTo(0, scrollY);
});
</script>
@endsection

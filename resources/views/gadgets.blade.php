@extends('app')
@section('title') Gadgets @endsection
@section('content1')

<div class="container auction-section">
    <div class="row">

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="HP 15.6 Ryzen 5"
                    data-price="$50"
                    data-description="HP 15.6 Ryzen 5 Laptop - 8GB RAM, 256GB SSD - Rose Gold"
                    data-rating="4"
                    data-image="{{ asset('image/laptop1.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/laptop1.jpg') }}" class="card-img-top" alt="HP Laptop">
                <div class="card-body text-center">
                    <h5 class="card-title">HP 15.6 Ryzen 5</h5>
                    <p class="card-text">Current bid: $50</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="Dell XPS 13"
                    data-price="$65"
                    data-description="Dell - XPS 13.3&quot; 4K Ultra HD Touch-Screen Laptop - Intel Core i7"
                    data-rating="5"
                    data-image="{{ asset('image/laptop2.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/laptop2.jpg') }}" class="card-img-top" alt="Dell XPS">
                <div class="card-body text-center">
                    <h5 class="card-title">Dell XPS 13</h5>
                    <p class="card-text">Current bid: $65</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="Zenbook Pro 14"
                    data-price="$55"
                    data-description="Zenbook Pro 14 Duo OLED (UX8402)｜Laptops For Creators｜ASUS Australia"
                    data-rating="4"
                    data-image="{{ asset('image/laptop3.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/laptop3.jpg') }}" class="card-img-top" alt="Zenbook">
                <div class="card-body text-center">
                    <h5 class="card-title">Zenbook Pro 14</h5>
                    <p class="card-text">Current bid: $55</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="Apple MacBook Air M4"
                    data-price="$65"
                    data-description="Apple MacBook Air 13 inch M4 Liquid Retina Display 24GB RAM 512GB SSD Sky Blue"
                    data-rating="5"
                    data-image="{{ asset('image/laptop4.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/laptop4.jpg') }}" class="card-img-top" alt="MacBook Air">
                <div class="card-body text-center">
                    <h5 class="card-title">Apple MacBook Air M4</h5>
                    <p class="card-text">Current bid: $65</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="Core i7 Desktop"
                    data-price="$65"
                    data-description="Full set Core i7 Desktop Computer RAM 16GB SSD 128GB HD ..."
                    data-rating="3.5"
                    data-image="{{ asset('image/computer1.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/computer1.jpg') }}" class="card-img-top" alt="Desktop PC">
                <div class="card-body text-center">
                    <h5 class="card-title">Core i7 Desktop</h5>
                    <p class="card-text">Current bid: $65</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="Apple iMac 21.5&quot;"
                    data-price="$65"
                    data-description="Apple iMac 21.5in 2.7GHz Core i5 All In one"
                    data-rating="4.5"
                    data-image="{{ asset('image/computer2.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/computer2.jpg') }}" class="card-img-top" alt="iMac">
                <div class="card-body text-center">
                    <h5 class="card-title">Apple iMac 21.5"</h5>
                    <p class="card-text">Current bid: $75</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
                <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="ASUS ExpertCenter"
                    data-price="$65"
                    data-description="ASUS ExpertCenter A3202WVAK-BPB0010 13th Gen Core-i5 All-In-One PC"
                    data-rating="4"
                    data-image="{{ asset('image/computer3.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/computer3.jpg') }}" class="card-img-top" alt="ASUS ExpertCenter">
                <div class="card-body text-center">
                    <h5 class="card-title">ASUS ExpertCenter</h5>
                    <p class="card-text">Current bid: $45</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card auction-card position-relative">
               <button class="btn btn-sm quick-view-btn"
                    data-toggle="modal" data-target="#productModal"
                    data-name="AOC A33 All-in-One"
                    data-price="$65"
                    data-description="AOC A33 Intel Celeron N5095 23.8 FHD All in One PC"
                    data-rating="5"
                    data-image="{{ asset('image/computer4.jpg') }}">
                    <i class="fas fa-search"></i> Quick View
                </button>
                <img src="{{ asset('image/computer4.jpg') }}" class="card-img-top" alt="AOC A33">
                <div class="card-body text-center">
                    <h5 class="card-title">AOC A33 All-in-One</h5>
                    <p class="card-text">Current bid: $55</p>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-4 text-center">
      <img src="" alt="" class="modal-img mb-3" style="max-width: 100%; height: auto;">
      <h4 class="modal-title mb-2"></h4>
      <p class="mb-1">Rating: <span class="modal-rating"></span> ⭐</p>
      <p class="modal-description mb-2"></p>
      <h5 class="modal-price mb-3"></h5>
      <a href="#" class="btn btn-bid"><i class="fas fa-gavel"></i> Bid Now</a>
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

    var modal = $(this);
    modal.find('.modal-title').text(name);
    modal.find('.modal-price').text(price);
    modal.find('.modal-description').text(description);
    modal.find('.modal-rating').text(rating);
    modal.find('.modal-img').attr('src', image);
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

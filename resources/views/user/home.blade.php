@extends('user.app')
@section('title') Home @endsection
@section('content3')
<div class="container page-wrapper">
  <div class="hero-card p-4">
    
    <div id="heroCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

            <div class="carousel-item">
          <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <img src="{{ asset('image/laptop.webp') }}" class="img-fluid" style="max-height:300px;" alt="Laptop">
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <div>
                <div class="lead-sub">TECH & GADGETS</div>
                <h1 class="hero-title">Latest Laptop Collection</h1>
                <p class="hero-desc">
                  High-performance laptops with cutting-edge technology. Perfect for work, gaming, and creative tasks.
                </p>
                 <a href="#" class="btn custom-btn me-2">See Details</a>
                <a href="#" class="btn custom-btn">Bid Now</a>
              </div>
            </div>
          </div>
        </div>

           <div class="carousel-item active">
          <div class="row">
           
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <img src="{{ asset('image/buddha.jpg') }}" class="img-fluid" style="max-height:300px;" alt="Antique">
            </div>
         
            <div class="col-md-6 d-flex align-items-center">
              <div>
                <div class="lead-sub">SPECIAL ANTIQUE</div>
                <h1 class="hero-title">Special Sculpture Sakhyamuni Buddha</h1>
                <p class="hero-desc">
                  Sakhyamuni Buddha composition sculpture. Crafted of ceramic, with a matte glaze and crackle finish. Depicts two gripping fists, pulling at a face.
                </p>
                 <a href="#" class="btn custom-btn me-2">See Details</a>
                <a href="#" class="btn custom-btn">Bid Now</a>
              </div>
            </div>
          </div>
        </div>

     
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <img src="{{ asset('image/artwork.jpg') }}" class="img-fluid" style="max-height:300px;" alt="Artwork">
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <div>
                <div class="lead-sub">FINE ART</div>
                <h1 class="hero-title">Exclusive Artwork Pieces</h1>
                <p class="hero-desc">
                  Original artwork from renowned artists. Perfect for collectors and interior decoration.
                </p>
                 <a href="#" class="btn custom-btn me-2">See Details</a>
                 <a href="#" class="btn custom-btn">Bid Now</a>
              </div>
            </div>
          </div>
        </div>

       
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <img src="{{ asset('image/memorabilia.webp') }}" class="img-fluid" style="max-height:300px;" alt="Memorabilia">
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <div>
                <div class="lead-sub">MEMORABILIA</div>
                <h1 class="hero-title">Rare Collectible Items</h1>
                <p class="hero-desc">
                  Collectible memorabilia from history and pop culture, perfect for enthusiasts.
                </p>
                 <a href="#" class="btn custom-btn me-2">See Details</a>
                <a href="#" class="btn custom-btn">Bid Now</a>
              </div>
            </div>
          </div>
        </div>

       
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <img src="{{ asset('image/automobile.jpg') }}" class="img-fluid" style="max-height:300px;" alt="Automobiles">
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <div>
                <div class="lead-sub">AUTOMOBILES</div>
                <h1 class="hero-title">Classic & Modern Cars</h1>
                <p class="hero-desc">
                  From vintage classics to modern marvels, explore our exclusive automobile collection.
                </p>
                 <a href="#" class="btn custom-btn me-2">See Details</a>
                <a href="#" class="btn custom-btn">Bid Now</a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </div>
</div>

<div class="explore">
  <section class="explore-items py-5">
 
    <h5 class="text-uppercase text-warning mb-4"style="margin-left: 36px;">Explore Items</h5>

    <div id="exploreCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

       
        <div class="carousel-item active">
          <div class="row">

      
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border">
                <div class="row no-gutters">
                  <div class="col-6 p-1"><img src="image/gadget1.jpg" class="img-fluid" alt="Gadget"></div>
                  <div class="col-6 p-1"><img src="image/gadget2.webp" class="img-fluid" alt="Gadget"></div>
                  <div class="col-6 p-1"><img src="image/gadget4.jpg" class="img-fluid" alt="Gadget"></div>
                  <div class="col-6 p-1"><img src="image/gadget3.jpg" class="img-fluid" alt="Gadget"></div>
                </div>
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-1">Gadgets</h6>
                  <p class="text-muted small">2150 Items</p>
                  <a href="#" class="btn btn-outline-warning btn-sm">Explore</a>
                </div>
              </div>
            </div>

       
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border">
                <div class="row no-gutters">
                  <div class="col-6 p-1"><img src="image/artwork1.jpg" class="img-fluid" alt="Artwork"></div>
                  <div class="col-6 p-1"><img src="image/artwork4.webp" class="img-fluid" alt="Artwork"></div>
                  <div class="col-6 p-1"><img src="image/artwork3.jpg" class="img-fluid" alt="Artwork"></div>
                  <div class="col-6 p-1"><img src="image/artwork2.webp" class="img-fluid" alt="Artwork"></div>
                </div>
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-1">Artwork</h6>
                  <p class="text-muted small">1870 Items</p>
                  <a href="#" class="btn btn-outline-warning btn-sm">Explore</a>
                </div>
              </div>
            </div>

           
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border">
                <div class="row no-gutters">
                  <div class="col-6 p-1"><img src="image/antique1.jpg" class="img-fluid" alt="Antique"></div>
                  <div class="col-6 p-1"><img src="image/antique2.jpg" class="img-fluid" alt="Antique"></div>
                  <div class="col-6 p-1"><img src="image/antique3.jpg" class="img-fluid" alt="Antique"></div>
                  <div class="col-6 p-1"><img src="image/antique4.jpg" class="img-fluid" alt="Antique"></div>
                </div>
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-1">Antiques & Collectibles</h6>
                  <p class="text-muted small">3245 Items</p>
                  <a href="#" class="btn btn-outline-warning btn-sm">Explore</a>
                </div>
              </div>
            </div>

          </div>
        </div>

    
        <div class="carousel-item">
          <div class="row">

          <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border">
                <div class="row no-gutters">
                 <div class="col-6 p-1"><img src="image/antique1.jpg" class="img-fluid" alt="Antique"></div>
                  <div class="col-6 p-1"><img src="image/antique2.jpg" class="img-fluid" alt="Antique"></div>
                  <div class="col-6 p-1"><img src="image/antique3.jpg" class="img-fluid" alt="Antique"></div>
                  <div class="col-6 p-1"><img src="image/antique4.jpg" class="img-fluid" alt="Antique"></div>
                </div>
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-1">Antiques & Collectibles</h6>
                  <p class="text-muted small">3245 Items</p>
                  <a href="#" class="btn btn-outline-warning btn-sm">Explore</a>
                </div>
              </div>
            </div>

            
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border">
                <div class="row no-gutters">
                  <div class="col-6 p-1"><img src="image/automobiles1.jpg" class="img-fluid" alt="Automobile"></div>
                  <div class="col-6 p-1"><img src="image/automobiles2.jpg" class="img-fluid" alt="Automobile"></div>
                  <div class="col-6 p-1"><img src="image/automobiles3.jpg" class="img-fluid" alt="Automobile"></div>
                  <div class="col-6 p-1"><img src="image/automobiles4.webp" class="img-fluid" alt="Automobile"></div>
                </div>
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-1">Automobile</h6>
                  <p class="text-muted small">980 Items</p>
                  <a href="#" class="btn btn-outline-warning btn-sm">Explore</a>
                </div>
              </div>
            </div>

        
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border">
                <div class="row no-gutters">
                  <div class="col-6 p-1"><img src="image/memorabilia1.jpg" class="img-fluid" alt="Memorabilia"></div>
                  <div class="col-6 p-1"><img src="image/memorabilia2.jpg" class="img-fluid" alt="Memorabilia"></div>
                  <div class="col-6 p-1"><img src="image/memorabilia3.webp" class="img-fluid" alt="Memorabilia"></div>
                  <div class="col-6 p-1"><img src="image/memorabilia4.webp" class="img-fluid" alt="Memorabilia"></div>
                </div>
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-1">Memorabilia</h6>
                  <p class="text-muted small">1240 Items</p>
                  <a href="#" class="btn btn-outline-warning btn-sm">Explore</a>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

   
      <a class="carousel-control-prev" href="#exploreCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#exploreCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>

</div>
 <br>

<div class="container">
<h5 class="text-uppercase text-warning justify-content left">How It Works</h5>
<br>

  <div class="row text-center align-items-center position-relative">

  
    <div class="d-none d-md-block" style="position:absolute; top:35px; left:15%; right:15%; border-top:2px dashed #d4af37; z-index:1;"></div>


    <div class="col-md-4 position-relative">
      <div class="mb-3 position-relative" style="z-index:2;">
        <a href="{{ url('/register') }}" class="d-inline-flex justify-content-center align-items-center bg-dark text-warning rounded p-3 text-decoration-none" style="width:70px; height:70px;">
          <i class="fas fa-user-plus fa-2x"></i>
        </a>
      </div>
      <h5 class="font-weight-bold">Create Account</h5>
      <p class="text-muted small">
        Create Account On Web Or On App By Email Id Or Social Media.
      </p>
    </div>

  
    <div class="col-md-4 position-relative">
      <div class="mb-3 position-relative" style="z-index:2;">
        <a href="{{ url('/products') }}" class="d-inline-flex justify-content-center align-items-center bg-dark text-warning rounded p-3 text-decoration-none" style="width:70px; height:70px;">
          <i class="fas fa-compass fa-2x"></i>
        </a>
      </div>
      <h5 class="font-weight-bold">Explore Items</h5>
      <p class="text-muted small">
        Explore Items From Variety Of Categories Like Gadgets, Artwork, Antiques & Collectibles Etc.
      </p>
    </div>


    <div class="col-md-4 position-relative">
      <div class="mb-3 position-relative" style="z-index:2;">
        <a href="" class="d-inline-flex justify-content-center align-items-center bg-dark text-warning rounded p-3 text-decoration-none" style="width:70px; height:70px;">
          <i class="fas fa-gavel fa-2x"></i>
        </a>
      </div>
      <h5 class="font-weight-bold">Place Bid</h5>
      <p class="text-muted small">
        Place Bids On Auctions To Buy Items And If You Bid Highest You Will Win The Auction.
      </p>
    </div>

  </div>
</div>
<br>

<div class="container my-5">
  <div class="row align-items-center">
    <div class="col-md-6 text-center">
      <div class="d-flex justify-content-center">
        <img src="image/image2.png" class="img-fluid mx-2" alt="App screen" style="max-height:350px;">
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-4 bg-light" style="border-radius:6px;">
        <h6 class="text-uppercase text-warning">Browse Our Website</h6>
        <h3 class="font-weight-bold mb-3">Bid From Anywhere<br>Through Our Website</h3>
        <p class="text-muted">Register/Login to our website and start bidding anytime, anywhere with just a few taps.</p>
         <div class="mt-4">
          <a href="#" class="btn btn-dark mr-2">
            <i class="fab fa-windows mr-2"></i> Windows
          </a>
          <a href="#" class="btn btn-dark">
            <i class="fab fa-apple mr-2"></i> Mac
          </a>
        </div>
      </div>
    </div>

  </div>
</div>



@endsection

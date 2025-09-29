
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ url('/home') }}">BidMaster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
       <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                Categories
            </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ url('/products') }}">
        <i class="fas fa-box-open mr-2"></i> All Products
    </a>
    <a class="dropdown-item" href="{{ url('/products/gadgets') }}">
        <i class="fas fa-microchip mr-2"></i> Gadgets
    </a>
    <a class="dropdown-item" href="{{ url('/products/artwork') }}">
        <i class="fas fa-paint-brush mr-2"></i> Artwork
    </a>
    <a class="dropdown-item" href="{{ url('/products/memorabilia') }}">
        <i class="fas fa-star mr-2"></i> Memorabilia
    </a>
    <a class="dropdown-item" href="{{ url('/products/antiques') }}">
        <i class="fas fa-hourglass-half mr-2"></i> Antiques &amp; Collectibles
    </a>
    <a class="dropdown-item" href="{{ url('/products/automobiles') }}">
        <i class="fas fa-car-side mr-2"></i> Automobiles
    </a>
</div>
        </li>
        
    </ul>
</div>
            
      <div class="form-inline my-2 my-lg-0">
    <a href="{{ url('/register') }}" class="text-white mx-2" title="Register">
        <i class="fas fa-user-circle" style="font-size: 1.5rem; color: #fff;"></i>
    </a>
</div>


    </a>
   
</div>
 </nav>
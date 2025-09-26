
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
                 <a class="dropdown-item" href="{{ url('/products') }}">All Products</a>
                <a class="dropdown-item" href="{{ url('/products/gadgets') }}">Gadgets</a>
                <a class="dropdown-item" href="{{ url('/products/artwork') }}">Artwork</a>
                <a class="dropdown-item" href="{{ url('/products/memorabilia') }}">Memorabilia</a>
                <a class="dropdown-item" href="{{ url('/products/antiques') }}">Antiques and Collectibles</a>
                <a class="dropdown-item" href="{{ url('/products/automobiles') }}">Automobiles</a>
            </div>
        </li>
        
    </ul>
</div>
            
   <div class="form-inline my-2 my-lg-0">
    <a href="{{ url('/register') }}" class="text-white mx-2" title="Register">
        <i class="bi bi-person-plus" style="font-size: 1.5rem;"></i>
    </a>
   
</div>
    </nav>
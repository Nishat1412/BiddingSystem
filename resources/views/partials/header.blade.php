<nav class="navbar navbar-expand-lg navbar-dark main-navbar py-2">
    <div class="container-fluid" style="max-width: 1100px; max-height: 40px;">
     
        <a class="navbar-brand font-weight-bold" href="{{ url('/home') }}">BidMaster</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#mainNavbar" aria-controls="mainNavbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">


              <form action="{{ route('products.search') }}" method="GET" class="form-inline mx-auto w-50">
                <input class="form-control w-100 rounded-pill px-3"
                    type="search"
                    name="query"
                    placeholder="Search Items..."
                    value="{{ request('query') }}">
            </form>


            <div class="form-inline my-2 my-lg-0">
                <a href="#" class="text-white mx-3" title="Notifications">
                    <i class="fas fa-bell" style="font-size:1.3rem;"></i>
                </a>
                <a href="{{ url('/register') }}" class="text-white mx-2" title="Register">
                    <i class="fas fa-user-circle" style="font-size:1.5rem;"></i>
                </a>
            </div>
        </div>
    </div>
</nav>


            <nav class="navbar navbar-expand second-navbar py-1">
                <div class="container-fluid" style="max-width: 1100px; max-height: 30px;">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="auctionsDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Auctions
                </a>
                <div class="dropdown-menu" aria-labelledby="auctionsDropdown">
                    <a class="dropdown-item" href="{{ url('/auctions/gadgets') }}">
                        <i class="fas fa-microchip mr-2"></i> Gadgets
                    </a>
                    <a class="dropdown-item" href="{{ url('/auctions/artwork') }}">
                        <i class="fas fa-palette mr-2"></i> Artwork
                    </a>
                    <a class="dropdown-item" href="{{ url('/auctions/antiques') }}">
                        <i class="fas fa-hourglass mr-2"></i> Antiques & Collectibles
                    </a>
                    <a class="dropdown-item" href="{{ url('/auctions/memorabilia') }}">
                        <i class="fas fa-award mr-2"></i> Memorabilia
                    </a>
                    <a class="dropdown-item" href="{{ url('/auctions/automobiles') }}">
                        <i class="fas fa-car mr-2"></i> Automobiles
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/products') }}">
                    <i class="fas fa-gem mr-2" ></i> All Products
                </a>
                <a class="dropdown-item" href="{{ url('/products/gadgets') }}">
                    <i class="fas fa-microchip mr-2"></i> Gadgets
                </a>
                <a class="dropdown-item" href="{{ url('/products/artwork') }}">
                    <i class="fas fa-palette mr-2"></i> Artwork
                </a>
                <a class="dropdown-item" href="{{ url('/products/memorabilia') }}">
                    <i class="fas fa-award mr-2"></i> Memorabilia
                </a>
                <a class="dropdown-item" href="{{ url('/products/antiques') }}">
                    <i class="fas fa-hourglass mr-2"></i> Antiques & Collectibles
                </a>
                <a class="dropdown-item" href="{{ url('/products/automobiles') }}">
                    <i class="fas fa-car mr-2"></i> Automobiles
                </a>
            </div>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/howitworks') }}">How it Works</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/help') }}">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/legal') }}">Legal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">About Us</a>
            </li>
        </ul>
    </div>
</nav>


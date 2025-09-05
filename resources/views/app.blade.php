<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <title>Bidding System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}" >
</head>
<body>

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
                <a class="dropdown-item" href="{{ url('/gadgets') }}">Gadgets</a>
                <a class="dropdown-item" href="{{ url('/feature2') }}">Artwork</a>
                <a class="dropdown-item" href="#">Memorabilia</a>
                <a class="dropdown-item" href="#">Antiques and Collectibles</a>
                 <a class="dropdown-item" href="#">Automobiles</a>
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

    @yield('content1')
    
   <div class="row">
     @yield('content2')
    </div>

    <div class="row">
    @yield('content3')
    </div>
    
    <div class="row">
    @yield('content4')
    </div>

  
<div class="d-flex flex-column min-vh-100">
    <footer class="text-white text-center py-4 mt-auto">

       
        <div class="pt-2">
            <p class="mb-1">
                <i class="fas fa-phone-alt mr-2"></i> +1 (234) 567-8901
            </p>
            <p class="mb-3">
                <i class="fas fa-envelope mr-2"></i> support@bidmaster.com
            </p>
        </div>

        <div>
            <a href="https://www.facebook.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="https://www.google.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-google fa-lg"></i>
            </a>
            <a href="https://www.instagram.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a href="https://www.twitter.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-twitter fa-lg"></i>
            </a>
        </div>

        <div class="pt-3">
            &copy; {{ date('Y') }} BidMaster. All rights reserved.
        </div>
    </footer>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="row">
     @yield('scripts')
    </div>

</body>
</html>

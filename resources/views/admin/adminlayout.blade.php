<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <title>Bidding System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/adminlayout.css')}}" >
</head>
<body>
   <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
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
    <a href="{{ url('/admin/register') }}" class="text-white mx-2" title="AddAdmin">
        <i class="bi bi-person-plus" style="font-size: 1.5rem;"></i>
    </a>
   
</div>
</nav>

@yield('content4')
@yield('content')
@yield('style')


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

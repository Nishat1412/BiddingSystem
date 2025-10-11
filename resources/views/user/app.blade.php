<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth('user_record')
        <meta name="user-id" content="{{ Auth::guard('user_record')->id() }}">
    @endauth

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}" >
@stack('styles')
</head>
<body>

 
    @auth('user_record')
         @include('partials.header')
        @include('partials.dashboardNavbar')
    @elseif(Auth::guard('admin')->check())
         @include('partials.header')
        @include('partials.adminDashboardNavbar') 
    @else
       @include('partials.header')
    @endauth

    
    @yield('content')
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

    <div class="row">
    @yield('content5')
    </div>
  
    @include('partials.footer')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="row">
     @yield('scripts')
    </div>


</body>
</html>

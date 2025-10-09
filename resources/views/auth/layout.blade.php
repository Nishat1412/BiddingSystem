<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Bidding System')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/layout.css')}}" >
</head>
<body>
  
@include('partials.header')

@yield('content')
@yield('content1')


    <script>
        const signUpBtn = document.getElementById('signUp');
        const signInBtn = document.getElementById('signIn');
        const container = document.getElementById('main');

        if (signUpBtn && signInBtn && container) {
            signUpBtn.addEventListener('click', () => {
                container.classList.add("right-panel-active");
            });

            signInBtn.addEventListener('click', () => {
                container.classList.remove("right-panel-active");
            });
        }
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

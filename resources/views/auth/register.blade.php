@extends('auth.layout')
@section('title') Register @endsection
@section('content')
<div class="container" id="main">
    <!-- SIGN UP FORM -->
    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           
            <div class="heading-center">
                 <h4>Create Account</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="social-container">
                <a href="https://www.facebook.com" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.google.com" class="social-icon"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.linkedin.com" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <p class="para_icon">or use your email for registration</p>
            <div class="credentials">
                <input type="text" name="name" placeholder="Name" required />
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="phone" placeholder="Phone" />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                <div class="button-wrapper">
                    <button type="submit" class="btn btn-success">SIGN UP</button>
                </div>
            </div>
        </form>
    </div>

    <!-- SIGN IN FORM -->
    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="heading-center">
                <h2>Sign In</h2>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="social-container">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <p class="para_icon">or use your email for sign in</p>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <div class="button-wrapper">
                <button type="submit" class="btn btn-primary">SIGN IN</button>
            </div>
        </form>
    </div>

    <!-- OVERLAY -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h2>Welcome Back!</h2>
                <p>To stay connected with us please Login!</p>
                <button class="ghost btn btn-outline-light" id="signIn">SIGN IN</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h2>Hello, Friend!</h2>
                <p>Enter your details and start your bidding journey!</p>
                <button class="ghost btn btn-outline-light" id="signUp">SIGN UP</button>
            </div>
        </div>
    </div>
</div>
@endsection

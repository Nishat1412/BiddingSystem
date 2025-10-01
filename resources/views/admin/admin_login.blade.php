@extends('admin.adminloginlayout')
@section('title') Admin Login @endsection
@section('content')
<div class="container" id="main">
    <!-- ADMIN SIGN IN FORM -->
    <div class="form-container sign-in-container" style="width: 100%;">
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="heading-center">
                <h2>Admin Sign In</h2>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="social-container">
                <a href="https://www.facebook.com" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.google.com" class="social-icon"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.linkedin.com" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <p class="para_icon">or use your admin email for sign in</p>
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required />

            <div class="button-wrapper">
                <button type="submit" class="btn btn-primary">Log in to Dashboard</button>
            </div>
        </form>
    </div>

    <!-- OVERLAY -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h2>Admin Access Only</h2>
                <p>Please enter your admin credentials to manage the system</p>
            </div>
        </div>
    </div>
</div>
@endsection


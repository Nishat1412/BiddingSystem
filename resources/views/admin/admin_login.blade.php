@extends('auth.layout')
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
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <p class="para_icon">or use your admin email for sign in</p>
            <input type="email" name="email" placeholder="Admin Email" required />
            <input type="password" name="password" placeholder="Password" required />

            <div class="button-wrapper">
                <button type="submit" class="btn btn-primary">ADMIN LOGIN</button>
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

@section('style')
    <style>
    .sign-in-container {
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        max-width: 400px;
        margin: 50px auto;
        text-align: center;
        
    }
    
    .social-container a {
        margin: 0 10px;
        font-size: 18px;
        color: #333;
    }
    .para_icon {
        margin: 15px 0;
        font-size: 14px;
        color: #555;
    }
    .sign-in-container input[type="email"],
    .sign-in-container input[type="password"] {
        width: 80%;           /* slightly narrower */
        padding: 8px 10px;    /* smaller padding */
        font-size: 14px;      /* smaller text */
        margin-bottom: 10px;  /* less space between inputs */
        border-radius: 6px;   /* slightly rounded corners */
        border: 1px solid #ccc;
        box-sizing: border-box; /* include padding in width */
}
    
</style>
@endsection

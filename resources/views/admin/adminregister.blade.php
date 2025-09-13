@extends('admin.adminlayout')
@section('title') Admin Register @endsection
@section('content')
<div class="container" id="main">
    <!-- SIGN UP FORM -->
    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('adminregister.store') }}">
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
                 <h4>Register Admin</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="social-container">
                <a href="https://www.facebook.com" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.google.com" class="social-icon"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.linkedin.com" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="credentials">
                
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                <div class="button-wrapper">
                    <button type="submit" class="btn btn-success">SIGN UP</button>
                </div>
            </div>
        </form>
    </div>
 @endsection

 @section('style')
    <style>
        #main {
        min-height: 70vh;     
    }   

    .container{
        margin-top: 20px;
        margin-bottom: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sign-up-container {
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        max-width: 350px;
        text-align: center;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
    }
    .social-container {
        display: flex;
        justify-content: center; /* centers the icons */
        gap: 20px;                /* spacing between icons */
    }

    .social-icon {
        font-size: 15px;          /* size of icons */
        color: black;             /* icon color */
        text-decoration: none;    /* remove underline */
        transition: color 0.3s ease; 
    }

    .social-icon:hover {
        color: #555;              /* optional hover effect */
    }

    .sign-up-container .credentials {
        display: flex;
        flex-direction: column;
    }

    .sign-up-container input {
        background: #f0f0f0;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
        border-radius: 5px;
    }

    .sign-up-container .button-wrapper {
        margin-top: 20px;
    }

    .sign-up-container .btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 12px 45px;
        border-radius: 20px;
        cursor: pointer;
        transition: transform 80ms ease-in;
    }

    .sign-up-container .btn:hover {
        background-color: #218838;
    }
    </style>
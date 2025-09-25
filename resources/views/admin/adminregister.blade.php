@extends('admin.registerloginlayout')
@section('title') Admin Register @endsection
@section('content')
<div class="container" id="main">
    <!-- ADMIN SIGN UP FORM -->
    <div class="form-container sign-in-container" style="width: 100%;">
        <form method="POST" action="{{ route('adminregister.store') }}">
            @csrf

            <div class="heading-center">
                <h3>Admin Register</h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0; padding:0; list-style:none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required />

            <div class="button-wrapper">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>

    <!-- OVERLAY -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h2>Admin Access Only</h2>
                <p>Create an admin account to manage the system</p>
            </div>
        </div>
    </div>
</div>
@endsection


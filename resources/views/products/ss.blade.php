@extends('app')
@section('title', 'User Dashboard')
@section('content5')
<div class="container py-5">
    <p>Welcome to your dashboard.</p>
    <p>You are logged in as {{Auth::guard('user_record')->user()->username }}</p>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</div>
@endsection
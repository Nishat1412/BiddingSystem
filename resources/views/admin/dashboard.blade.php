@extends('admin.adminlayout')
@section('title') Admin Dashboard @endsection
@section('content4')
<div class="container">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>You are logged in as {{ session('admin_email') }}</p>
    <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
</div>
@endsection

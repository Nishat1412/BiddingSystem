@extends('user.app')
@section('title', 'User Dashboard')
@section('content5')
<!--<div class="container py-5">
    <p>Welcome to your dashboard.</p>
    <p>You are logged in as {{Auth::guard('user_record')->user()->username }}</p>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</div>-->


@include('partials.dashboardNavbar')

<div class="container mt-5">
    <h3>Your Listed Products</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Product</th>
          <th>Category</th>
          <th>Price</th>
          <th>Auction Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach(DB::table('products')->where('user_id', Auth::guard('user_record')->user()->id)->get() as $prod)
        <tr>
          <td>{{ $prod->product_name }}</td>
          <td>{{ $prod->category }}</td>
          <td>${{ $prod->product_price }}</td>
          <td>{{ ucfirst($prod->auction_status) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>


@endsection
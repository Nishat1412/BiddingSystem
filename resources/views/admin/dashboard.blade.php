@extends('admin.adminlayout')
@section('title') Admin Dashboard @endsection
@section('content')
    <div class="admin_navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
         Dashboard
    </a>

    <div class="ml-auto d-flex align-items-center">
        <span class="mr-3">
            {{ session('admin_email') }} 
        </span>
        <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
    </div>
    </nav>
</div>
@endsection

@section('content1')
<div class="container mt-5">
<h3>Pending Auction Requests</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Product</th>
          <th>User ID</th>
          <th>Category</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach(DB::table('products')->where('auction_status','pending')->get() as $prod)
        <tr>
          <td>{{ $prod->product_name }}</td>
          <td>{{ $prod->user_id }}</td>
          <td>{{ $prod->category }}</td>
          <td>${{ $prod->product_price }}</td>
          <td>
            <form action="{{ route('admin.auctionAction',$prod->id) }}" method="POST" class="d-inline">
              @csrf
              <input type="hidden" name="action" value="approved">
              <button class="btn btn-success btn-sm">Approve</button>
            </form>
            <form action="{{ route('admin.auctionAction',$prod->id) }}" method="POST" class="d-inline">
              @csrf
              <input type="hidden" name="action" value="rejected">
              <button class="btn btn-danger btn-sm">Reject</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection

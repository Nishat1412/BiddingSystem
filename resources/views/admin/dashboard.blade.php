@extends('admin.adminlayout')
@section('title') Admin Dashboard @endsection
@section('content1')
<div class="pending-card card shadow-sm">
    <!-- Card header (black top portion) -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 text-white">Pending Requests</h5>
        <i class="bi bi-bell-fill text-warning"></i>
    </div>

    <!-- Card body -->
    <div class="card-body">
        <p class="card-text">You have pending auction requests that need approval.</p>
        <a href="{{ route('admin.pendingAuctions') }}" class="btn btn-primary btn-view">
            View Pending Auctions
        </a>
    </div>
</div>
<div class="pending-card card shadow-sm">
    <!-- Card header (black top portion) -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 text-white">Bid History</h5>
        <i class="bi bi-bell-fill text-warning"></i>
    </div>

    <!-- Card body -->
    <div class="card-body">
        <p class="card-text">Check all the bid history here.</p>
        <a href="#" class="btn btn-primary btn-view">
            View Bid History
        </a>
    </div>
</div>


<!--
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
    </table>-->

@endsection

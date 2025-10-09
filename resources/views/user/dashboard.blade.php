@extends('user.app')
@section('title', 'User Dashboard')
@section('content5')
<div class="container mt-5">
      <h3 class="heading mb-4"> Your Listed Products </h3>
    <table class="table table-bordered">
    <thead class="table-heading">
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
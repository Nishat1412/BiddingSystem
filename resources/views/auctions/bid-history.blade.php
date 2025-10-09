@extends('admin.adminlayout')
@section('title') Bid History @endsection

@section('content1')
<div class="container mt-4 bid-history pb-5">
    <h3 class="heading mb-4">All Bid History</h3>

    <div class="card-body">
        @if($bids->isEmpty())
            <p class="text-muted text-center mb-0">No bids found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-4">
                    <thead class="custom-thead">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Bidder</th>
                            <th>Bid Amount</th>
                            <th>Auction ID</th>
                            <th>Product ID</th>
                            <th>User Record ID</th>
                            <th>Bid Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bids as $index => $bid)
                            <tr>
                                <td>{{ $bids->firstItem() + $index }}</td>
                                <td>{{ $bid->product_name }}</td>
                                <td>{{ $bid->username }}</td>
                                <td>${{ number_format($bid->bid_amount, 2) }}</td>
                                <td>{{ $bid->auction_id }}</td>
                                <td>{{ $bid->product_id }}</td>
                                <td>{{ $bid->user_record_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($bid->created_at)->format('M d, Y h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $bids->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
</div>

@endsection

@extends('admin.adminlayout')
@section('title') Admin Dashboard @endsection
@section('content1')
<div class="row">
  <div class="pending-card card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 text-white">Pending Requests</h5>
        <i class="bi bi-bell-fill text-warning"></i>
    </div>

    <div class="card-body">
        <p class="card-text">You have pending auction requests that need approval.</p>
        <a href="{{ route('admin.pendingAuctions') }}" class="btn btn-primary btn-view">
            View Pending Auctions
        </a>
    </div>
</div>
<div class="pending-card card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 text-white">Bid History</h5>
        <i class="bi bi-bell-fill text-warning"></i>
    </div>

    
    <div class="card-body">
        <p class="card-text">Check all the bid history here.</p>
        <a href="{{ route('bids.index') }}" class="btn btn-primary btn-view">
            View Bid History
        </a>
    </div>
</div>
</div>

@endsection

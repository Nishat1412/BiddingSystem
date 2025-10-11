@extends('user.app')
@section('title') How It Works @endsection

@section('content1')

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">

           
            <div class="text-center">
                <h2 class="mb-4">How BidMaster Works</h2>
                <p class="lead">
                    Welcome to BidMaster, the premier platform for online auctions. Participating is simple, secure, and exciting. Follow the steps below to start bidding on your favorite items today.
                </p>
                <p class="text-muted">
                    Our system is designed to be fair and transparent. You can view the full bid history for any item, and you'll receive notifications if you are outbid, giving you a chance to place a new bid before the time runs out.
                </p>
            </div>

            <hr class="my-5">

           
            <div class="text-center mb-4">
                <h3>Watch Our Quick Guide</h3>
            </div>
                
                <video controls class="w-100 shadow-lg rounded">
                    <source src="{{ ('videos/video.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            

        </div>
    </div>
</div>

@endsection
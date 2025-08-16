@extends('app')
@section('title') Home @endsection
@section('content3')
<div class="container mt-4">
    <div class="bg-light shadow p-4 rounded">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-2">
                    <marquee behavior="scroll" direction="right" scrollamount="8" class="pt-5 mb-3">
                        <h3>Where your dream deal goes once… twice… SOLD!</h3>
                    </marquee>

                    <p class="pt-2" style="font-size: 20px">
                        Join Bid Master — the ultimate auction arena where smart bids win big!
                    </p>
                </div>
                <form class="mb-3">
                    <div class="input-group w-70">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <div class="text-center">
                    <img src="https://media.giphy.com/media/OU8nFZNCcgaFr2WcJR/giphy.gif"
                         alt="Auction GIF" class="img-fluid mt-3" style="max-width: 150px;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex flex-column gap-3">
                    <img src="image/icon1.jpg" style="width: 130px; height: 130px;" class="rounded" alt="Image 1">

                    <div class="d-flex justify-content-end">
                        <img src="image/icon2.jpg" style="width: 130px; height: 130px;" class="rounded" alt="Image 2">
                    </div>
                    
                    <img src="image/icon3.jpg" style="width: 130px; height: 130px;" class="rounded" alt="Image 3">
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container mt-4 container-footer-gap">
   
</div>


@endsection

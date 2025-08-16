@extends('app')
@section('title') Feature @endsection
@section('content2')

    <div class="container mt-6">
        <br>
        <br>
        <h2>Welcome to the Bidding System</h2>
        <p>Browse and bid on a wide range of items!</p>
        <br>
    </div>

    <div class="container auction-section">
    <div class="row">
        <div class="col-md-3 auction-card">
            <div class="card">
                <img src="{{ asset('image/computer1.jpg') }}" class="card-img-top" alt="Item">
                <div class="card-body">
                    <h5 class="card-title">Item #1</h5>
                    <p class="card-text">Current bid: $50</p>
                    <p class="description"> Full set Core i7 Desktop Computer RAM 16GB SSD 128GB HD ...</p>
                    <a href="#" class="btn btn-primary mt-2">Bid Now</a>
                </div>
            </div>
        </div>



       <div class="col-md-3 auction-card">
                <div class="card">
                    <img src="{{ asset('image/computer2.jpg') }}" class="card-img-top" alt="Item">
                    <div class="card-body">
                        <h5 class="card-title">Item #2</h5>
                        <p class="card-text">Current bid: $65</p>
                        <p class="description">
                         Apple iMac 21.5in 2.7GHz Core i5 All In one
                        </p>
                        <a href="#" class="btn btn-primary mt-2">Bid Now</a>
                    </div>
                </div>
            </div>


           <div class="col-md-3 auction-card">
                <div class="card">
                    <img src="{{ asset('image/computer3.jpg') }}" class="card-img-top" alt="Item">
                    <div class="card-body">
                        <h5 class="card-title">Item #3</h5>
                        <p class="card-text">Current bid: $55</p>
                        <p class="description">
                           ASUS ExpertCenter A3202WVAK-BPB0010 13th Gen Core-i5 All-In-One PC
                        </p>
                        <a href="#" class="btn btn-primary mt-2">Bid Now</a>
                    </div>
                </div>
            </div>

        <div class="col-md-3 auction-card">
                <div class="card">
                    <img src="{{ asset('image/computer4.jpg') }}" class="card-img-top" alt="Item">
                    <div class="card-body">
                        <h5 class="card-title">Item #4</h5>
                        <p class="card-text">Current bid: $65</p>
                        <p class="description">
                            AOC A33 Intel Celeron N5095 23.8" FHD All in One PC
                        </p>
                        <a href="#" class="btn btn-primary mt-2">Bid Now</a>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="container mt-4 container-footer-gap">
   
</div>
@endsection
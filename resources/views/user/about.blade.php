@extends('user.app')
@section('title') About Us @endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush
@section('content1')

<div class="about-container">
    <div class="about-header">
        <h2>About BidMaster</h2>
        <p class="tagline">Connecting Collectors, Enthusiasts, and Sellers Worldwide.</p>
    </div>

    <div class="mission-section">
                <p>
            Welcome to BidMaster, the premier online destination for unique and valuable items. We were born from a passion for discovering rare treasures and a desire to create a trusted platform where people could buy and sell with confidence. Our mission is to make the world of auctions accessible, transparent, and exciting for everyone.
        </p>
    </div>

    <hr class="section-divider">

    <div class="values-section">
        <h4>Our Core Values</h4>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-search"></i></div>
                    <h5>Transparency</h5>
                    <p>We believe in clear rules and open communication. Bid history is always available, and product information is verified.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-shield-alt"></i></div>
                    <h5>Security</h5>
                    <p>Your safety is our top priority. We use secure systems to protect your data and ensure all transactions are safe.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-users"></i></div>
                    <h5>Community</h5>
                    <p>We are more than a platform; we are a community of passionate collectors, sellers, and enthusiasts.</p>
                </div>
            </div>
             <div class="col-md-6 col-lg-3">
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-gem"></i></div>
                    <h5>Quality</h5>
                    <p>We are committed to featuring high-quality, authentic items by verifying sellers and their products.</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="section-divider">

    <div class="team-section">
        <h4>Meet the Team</h4>
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card team-member-card">
                    <img src="https://placehold.co/150x150/EFEFEF/333?text=CEO" alt="Team Member">
                    <div class="card-body">
                        <h5 class="name">John Smith</h5>
                        <p class="title">Founder & Chief Curator</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                 <div class="card team-member-card">
                    <img src="https://placehold.co/150x150/333/EFEFEF?text=Lead" alt="Team Member">
                    <div class="card-body">
                        <h5 class="name">Jessica Smith</h5>
                        <p class="title">Lead Platform Engineer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <hr class="section-divider">

    <div class="join-us-section">
        <h4>Join Our Community</h4>
        <p>Ready to find your next treasure or sell a valuable item? Become a part of the BidMaster family today.</p>
        <a href="{{ route('auctions.index') }}" class="btn btn-success mt-3">Browse Auctions</a>
        <a href="{{ route('register.create') }}" class="btn btn-secondary mt-3">Register Now</a>
    </div>

</div>

@endsection

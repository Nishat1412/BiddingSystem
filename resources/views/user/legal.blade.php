@extends('user.app')
@section('title') Legal Help @endsection

@section('content1')

<div class="container my-5">

    {{-- ========= 1. Description Section ========= --}}
    <div class="row mb-5">
        <div class="col-lg-8 offset-lg-2 text-center">
            <h2 class="mb-4">Legal Assistance & Support</h2>
            <p class="lead">
                At BidMaster, we prioritize a fair and secure environment. If you encounter any issues regarding auction authenticity, payment disputes, or contract violations, our dedicated legal team is here to help.
            </p>
            <p>
                Below you will find the contact information for our legal experts who specialize in online auction law and consumer protection. Please do not hesitate to reach out to them with your concerns.
            </p>
        </div>
    </div>

    {{-- ========= 2. Legal Team Cards Section (Static HTML) ========= --}}
    <div class="row">

        {{-- Card 1 --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <img class="card-img-top" src="{{ asset('image/mushfiq_cropped.png') }}" alt="Photo of mushfiq">
                <div class="card-body">
                    <h5 class="card-title">Mushfiq Mawaz</h5>
                    <p class="card-text text-muted">Lawyer ID: LWYR-001</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-envelope mr-2"></i>mushfiq.mawaz@bidmaster.com</li>
                    <li class="list-group-item"><i class="fas fa-phone mr-2"></i>+1 (123) 456-7890</li>
                </ul>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <img class="card-img-top" src="{{ asset('image/nishatt.jpg') }}" alt="Photo of Nishat Afroz">
                <div class="card-body">
                    <h5 class="card-title">Nishat Afroz</h5>
                    <p class="card-text text-muted">Lawyer ID: LWYR-002</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-envelope mr-2"></i>nishat.afroz@bidmaster.com</li>
                    <li class="list-group-item"><i class="fas fa-phone mr-2"></i>+1 (234) 567-8901</li>
                </ul>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <img class="card-img-top" src="{{ asset('image/walid.png') }}" alt="Photo of Mohammed Walid">
                <div class="card-body">
                    <h5 class="card-title">Mohammed Walid</h5>
                    <p class="card-text text-muted">Lawyer ID: LWYR-003</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-envelope mr-2"></i>mohammed.walid@bidmaster.com</li>
                    <li class="list-group-item"><i class="fas fa-phone mr-2"></i>+1 (345) 678-9012</li>
                </ul>
            </div>
        </div>

        {{-- Card 4 --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <img class="card-img-top" src="{{ asset('image/lawyers/lawyer4.jpg') }}" alt="Photo of Michael Brown">
                <div class="card-body">
                    <h5 class="card-title">Nazibah Ibnat Nibedita</h5>
                    <p class="card-text text-muted">Lawyer ID: LWYR-004</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-envelope mr-2"></i>nazibah.ibnat@bidmaster.com</li>
                    <li class="list-group-item"><i class="fas fa-phone mr-2"></i>+1 (456) 789-0123</li>
                </ul>
            </div>
        </div>

    </div>

</div>

@endsection
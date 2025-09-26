@extends('user.app')
@section('title') Gadgets @endsection

@section('content1')
    @include('partials.dashboardNavbar')
    @include('partials.productContent')
@endsection


@section('scripts')
    <script src="{{ asset('js/product-modal.js') }}"></script>
@endsection


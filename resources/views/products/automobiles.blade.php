@extends('user.app')
@section('title') Automobiles @endsection

@section('content1')
    @include('partials.productContent')
@endsection

@section('scripts')
    <script src="{{ asset('js/product-modal.js') }}"></script>
@endsection

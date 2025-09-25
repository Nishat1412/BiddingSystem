@extends('app')
@section('title', 'Upload Documents')
@section('content1')
<div class="container py-4">
    <h2>Upload Documents for: {{ $product->product_name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('products.storeDocuments', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>National Identity Card</label>
            <input type="file" name="identity_card" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Cash Memo / Invoice</label>
            <input type="file" name="cash_memo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Submit for Approval</button>
        @php
            $category = old('category', '');
            $categoryRoute = match(strtolower($category)) {
                'gadgets' => route('products.gadgets'),
                'artwork' => route('products.artwork'),
                'antiques' => route('products.antiques'),
                'memorabilia' => route('products.memorabilia'),
                'automobiles' => route('products.automobiles'),
                default => route('products.index'),
            };
        @endphp
        <a href="{{ $categoryRoute }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

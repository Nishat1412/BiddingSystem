@extends('user.app')
@section('title', 'Add Product')
@section('content1')
<div class="container-create">
    <h3 class="heading mb-4">Add New Product</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" required value="{{ old('product_name') }}">
        </div>

       <div class="form-group mb-3">
    <label for="category">Category</label>
    <select name="category" id="category" class="form-control" required>
        <option value="" disabled {{ old('category') ? '' : 'selected' }}>-- Select a Category --</option>
        <option value="gadgets" {{ old('category') == 'gadgets' ? 'selected' : '' }}>Gadgets</option>
        <option value="artwork" {{ old('category') == 'artwork' ? 'selected' : '' }}>Artwork</option>
        <option value="memorabilia" {{ old('category') == 'memorabilia' ? 'selected' : '' }}>Memorabilia</option>
        <option value="antiques" {{ old('category') == 'antiques' ? 'selected' : '' }}>Antiques and Collectibles</option>
        <option value="automobiles" {{ old('category') == 'automobiles' ? 'selected' : '' }}>Automobiles</option>
    </select>
</div>


        <div class="form-group mb-3">
            <label>Price ($)</label>
            <input type="number" name="product_price" step="0.01" class="form-control" required value="{{ old('product_price') }}">
        </div>

        <div class="form-group mb-3">
            <label>Rating (0-5)</label>
            <input type="number" name="product_rating" step="0.1" max="5" class="form-control" value="{{ old('product_rating') }}">
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="product_description" class="form-control">{{ old('product_description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Product Image</label>
            <input type="file" name="product_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Product</button>
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

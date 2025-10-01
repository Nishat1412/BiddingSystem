<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $product->product_name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        img { max-width: 100px; margin-bottom: 20px; }
        h1, h2, p { margin: 5px 0; }
    </style>
</head>
<body>
   <div class="productpdf">
     <h1>{{ $product->product_name }}</h1>
    @if($product->product_image)
        <img src="{{ public_path('uploads/' . $product->product_image) }}" alt="Product Image">
    @endif
    <h2>Category: {{ $product->category }}</h2>
    <h2>Price: ${{ number_format($product->product_price, 2) }}</h2>
    <p>Product Rating: {{ $product->product_rating }}</p>
    <p>{{ $product->product_description ?? '' }}</p>
   </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">   
    <title>{{ $product->product_name }}</title>
    <style>
        body {  font-family: 'Playfair Display', serif; }
        img { max-width: 200px; margin-bottom: 20px; }
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

     @if($product->cash_memo)
            <h2>Cash Memo</h2>
            <img src="{{ public_path('invoice/' . $product->cash_memo) }}" alt="Cash Memo" style="max-width: 400px; margin-bottom: 20px;">
        @endif
   </div>
</body>
</html>

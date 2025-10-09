<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body>
    <h2>Hello {{ $owner->name ?? $owner->username }},</h2>
    <p>Your product <strong>{{ $product->product_name }}</strong> has been scheduled for auction.</p>
    <p>Start Time: {{ $product->start_time ?? 'N/A' }}</p>
    <p>End Time: {{ $product->end_time ?? 'N/A' }}</p>
    <p>Starting Price: ${{ number_format($product->starting_price ?? $product->product_price, 2) }}</p>
    <p>Good luck!</p>
</body>
</html>

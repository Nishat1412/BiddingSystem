<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body>
    <h2>Good news!</h2>
    <p>Your product <strong>{{ $product->product_name }}</strong> has been sold at auction.</p>
    <p>Final Price: ${{ number_format($auction->current_bid ?? $product->current_bid ?? 0, 2) }}</p>

    <h3>Buyer Details:</h3>
    <p><strong>Name:</strong> {{ $winner->name ?? $winner->username }}</p>
    <p><strong>Email:</strong> {{ $winner->email }}</p>
    <p><strong>Phone:</strong> {{ $winner->phone ?? 'Not provided' }}</p>

    <p>Please contact the buyer to know the details.</p>
</body>
</html>

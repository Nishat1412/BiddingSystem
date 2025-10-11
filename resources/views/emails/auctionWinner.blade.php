<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body>
    <h2>Congratulations {{ $winner->name ?? $winner->username }}!</h2>
    <p>You have won the auction for <strong>{{ $product->product_name }}</strong>.</p>
    <p>Final Price: ${{ number_format($auction->current_bid ?? $product->current_bid ?? 0, 2) }}</p>

    <h3>Seller Contact Details:</h3>
    <p><strong>Email:</strong> {{ $owner->email }}</p>
    <p><strong>Phone:</strong> {{ $owner->phone ?? 'Not provided' }}</p>

    <p>Please contact the seller to arrange payment & shipping.</p>
</body>
</html>

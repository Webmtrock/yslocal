<!-- resources/views/payment/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
</head>
<body>
    <h1>Make Payment</h1>
    
    <form action="{{ route('payment.create') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="50000"> <!-- Amount in paise (e.g., ₹500) -->
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RAZORPAY_KEY') }}"
            data-amount="50000"
            data-currency="INR"
            data-name="Your Company Name"
            data-description="Purchase Description"
            data-image="https://example.com/your_logo.png"
            data-prefill.email="user@example.com"
            data-prefill.contact="9999999999"
            data-notes.shopping_order_id="123456789"
            data-theme.color="#F37254"
        ></script>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>

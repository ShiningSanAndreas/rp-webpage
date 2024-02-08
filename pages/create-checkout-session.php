<?php
require_once '../vendor/autoload.php'; // Include Stripe PHP library

\Stripe\Stripe::setApiKey('sk_test_51OXMazJYQ5I7nITlmDc3WDHEUwgHYfTYTguuip7fs5bUTaRRv7jNEvpq6wT3cidrICdZmZuyXVtMYXxTHuES1xO000t7qFwlOA');  // Replace with your actual Stripe secret API key

header('Content-Type: application/json');

try {
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'eur', // Replace with your preferred currency
                    'product_data' => [
                        'name' => 'Product Name', // Replace with your product name
                    ],
                    'unit_amount' => 1000, // Replace with your product price in cents
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => 'http://yourdomain.com/success', // Replace with your success URL
        'cancel_url' => 'http://yourdomain.com/cancel', // Replace with your cancel URL
        'metadata' => [
            'user_id' => '123', // Replace with the actual user ID
            'custom_data' => 'Some additional data',
        ],
    ]);

    echo json_encode(['id' => $checkout_session->id]);
} catch (\Stripe\Exception\ApiErrorException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getError()->message]);
}
?>

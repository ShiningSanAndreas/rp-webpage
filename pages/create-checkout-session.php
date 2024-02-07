<?php
require_once '../vendor/autoload.php'; // Include Stripe PHP library

\Stripe\Stripe::setApiKey('sk_test_51OXMazJYQ5I7nITlmDc3WDHEUwgHYfTYTguuip7fs5bUTaRRv7jNEvpq6wT3cidrICdZmZuyXVtMYXxTHuES1xO000t7qFwlOA');

header('Content-Type: application/json');

$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [
        [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => '100 coini',
                ],
                'unit_amount' => 1000, // Amount in cents (10 EUR * 100)
            ],
            'quantity' => 1,
        ],
    ],
    'metadata' => [
         '123456789012345678',
    ],
    'mode' => 'payment',
    'success_url' => 'http://127.0.0.1:8000/pages/shop.php',
    'cancel_url' => 'http://127.0.0.1:8000/pages/rules.php',
]);

echo json_encode(['id' => $checkout_session->id]);
?>

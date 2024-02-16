<?php
session_start();
require_once '../vendor/autoload.php'; // Include Stripe PHP library

\Stripe\Stripe::setApiKey('sk_test_51OXMazJYQ5I7nITlmDc3WDHEUwgHYfTYTguuip7fs5bUTaRRv7jNEvpq6wT3cidrICdZmZuyXVtMYXxTHuES1xO000t7qFwlOA');  // Replace with your actual Stripe secret API key

header('Content-Type: application/json');
$discordId = $_SESSION["userData"]["discord_id"];
$payload = json_decode(file_get_contents('php://input'), true);

$coinPackageName = $payload['packageName'];
$coinPackageAmount = $payload['packageAmount'];


try {
   
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $coinPackageName, // Use the dynamic package name
                    ],
                    'unit_amount' => $coinPackageAmount, // Use the dynamic package amount
                ],
                'quantity' => 1,
            ],
        ],
        'payment_intent_data' => [
            'metadata' => [
                'discord_id' => $discordId,
            ],
        ],
        'mode' => 'payment',
        'success_url' => 'http://127.0.0.1:8000/pages/shop.php',
        'cancel_url' => 'http://127.0.0.1:8000/pages/rules.php',
    ]);

    echo json_encode(['id' => $checkout_session->id]);
} catch (\Stripe\Exception\ApiErrorException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getError()->message]);
}
?>

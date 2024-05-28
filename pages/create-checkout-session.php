<?php
session_start();
require_once realpath(__DIR__ . '/vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

header('Content-Type: application/json');
$discordId = $_SESSION["userData"]["discord_id"];
$payload = json_decode(file_get_contents('php://input'), true);

$coinPackageName = $payload['packageName'];
$coinPackageAmount = $payload['packageAmount'];
$coinAmount = $payload['coinAmount'];


try {
   
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $coinPackageName, 
                    ],
                    'unit_amount' => $coinPackageAmount, 
                ],
                'quantity' => 1,
            ],
        ],
        'payment_intent_data' => [
            'metadata' => [
                'discord_id' => $discordId,
                'coin_amount' => $coinAmount,
                'coin_package_name' => $coinPackageName,
            ],
        ],
        'mode' => 'payment',
        'success_url' => 'https://shiningrp.ee/shop',
        'cancel_url' => 'https://shiningrp.ee/shop',
    ]);

    echo json_encode(['id' => $checkout_session->id]);
} catch (\Stripe\Exception\ApiErrorException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getError()->message]); 
} catch (Exception $e) {
    // Log unexpected errors
    error_log($e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'An unexpected error occurred']);
}


<?php
require_once 'secrets.php'; // Include your Stripe secret key here
\Stripe\Stripe::setApiKey($stripeSecretKey);

// Get the Discord ID from the session or wherever you store it
$discordId = $_SESSION['discord_id']; // Replace with your actual session variable

try {
    // Create a Payment Intent with the necessary details
    $intent = \Stripe\PaymentIntent::create([
        'amount' => 1000,  // Amount in cents (you can adjust this based on your needs)
        'currency' => 'eur',
        'description' => 'Purchase of 100 coins',
        'metadata' => [
            'discord_id' => $discordId,
        ],
    ]);

    // Return the session details as JSON
    echo json_encode(['id' => $intent->id]);
} catch (\Stripe\Exception\CardException $e) {
    // Handle card errors
    http_response_code(500);
    echo json_encode(['error' => $e->getError()->message]);
} catch (\Exception $e) {
    // Handle other errors
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>

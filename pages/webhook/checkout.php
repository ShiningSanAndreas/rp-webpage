<?php
require_once '../../vendor/autoload.php'; // Include Stripe PHP library
include(".././config.php");

\Stripe\Stripe::setApiKey('sk_test_51OXMazJYQ5I7nITlmDc3WDHEUwgHYfTYTguuip7fs5bUTaRRv7jNEvpq6wT3cidrICdZmZuyXVtMYXxTHuES1xO000t7qFwlOA');

$discordWebhookUrl = 'https://discordapp.com/api/webhooks/1201523735874785321/p7C-eSwpwETu7nL70ASGZpqwX2OJKg-icskvK4JJ9FFewu4gmGhyd4VOXNgWhwsH1FJ8'; // Replace with your actual Discord webhook URL

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, 'whsec_284c1d3aa15b6c52e780ff5910cf6edc1ebb9ac0d832f4bf4e2cea0485a5b24f'
    );
} catch (\Exception $e) {
    http_response_code(400);
    exit('Webhook Error:' . $e->getMessage());
}

// Handle the event
if ($event->type == 'checkout.session.completed') {
    $session = $event->data->object;

    // Retrieve the customer ID or any other relevant information from $session
    $customer_id = $session->customer;

    // Update user balance in your database
    $amount = 100; // Amount in cents
    //updateBalance($customer_id, $amount);

    // Send Discord notification
    $message = "Purchase made by customer ID: $customer_id";
    sendDiscordNotification($discordWebhookUrl, $message);
}

http_response_code(200);

function updateBalance($customer_id, $amount) {
    // Implement your logic to update the user's balance in your database
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $stmt = $db->prepare('UPDATE users SET balance = balance + :amount WHERE stripe_customer_id = :customer_id');
    $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
    $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
    $stmt->execute();
}

function sendDiscordNotification($webhookUrl, $message) {
    $data = json_encode(['content' => $message]);

    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);

    return $result;
}
?>

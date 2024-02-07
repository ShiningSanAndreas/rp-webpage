<?php
require_once '../../vendor/autoload.php';
require_once 'secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
// Replace this endpoint secret with your endpoint's unique secret
$endpoint_secret = 'whsec_284c1d3aa15b6c52e780ff5910cf6edc1ebb9ac0d832f4bf4e2cea0485a5b24f';

$payload = @file_get_contents('php://input');
$event = null;

try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );
} catch (\UnexpectedValueException $e) {
    // Invalid payload
    echo '⚠️  Webhook error while parsing basic request.';
    http_response_code(400);
    exit();
}

if ($endpoint_secret) {
    // Only verify the event if there is an endpoint secret defined
    // Otherwise use the basic decoded event
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        echo '⚠️  Webhook error while validating signature.';
        http_response_code(400);
        exit();
    }
}

// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
        handlePaymentIntentSucceeded($paymentIntent);
        break;
    case 'payment_method.attached':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        // handlePaymentMethodAttached($paymentMethod);
        break;
    default:
        // Unexpected event type
        error_log('Received unknown event type');
}

http_response_code(200);

// Add a function to handle successful payment intent
function handlePaymentIntentSucceeded($paymentIntent) {
    // Implement your alert or notification logic here
    // For example, send a Discord notification
    sendDiscordNotification($paymentIntent);
}

// Function to send Discord notification
// Function to send Discord notification with styled embed
function sendDiscordNotification($paymentIntent) {
    $webhookURL = 'https://discord.com/api/webhooks/1201523735874785321/p7C-eSwpwETu7nL70ASGZpqwX2OJKg-icskvK4JJ9FFewu4gmGhyd4VOXNgWhwsH1FJ8';

    // Define embed structure
    $embed = [
        'title' => 'Payment Notification',
        'description' =>  $paymentIntent->amount . " | ". $paymentIntent->metadata . " <br>Payment succeeded for PaymentIntent ID: " . $paymentIntent,
        'color' => hexdec('00FF00'), // Green color, you can customize this
        'timestamp' => date('c'),
    ];

    $data = [
        'content' => ' ',
        'username' => 'SSA Pood',
        'avatar_url' => 'https://i.imgur.com/WKKMeBt.png',
        'embeds' => [$embed],
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($webhookURL, false, $context);

    if ($result === FALSE) {
        // Handle error (log, echo, etc.)
        error_log('Error sending Discord notification');
    }
}

?>

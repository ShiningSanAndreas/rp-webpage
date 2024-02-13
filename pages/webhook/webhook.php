
<?php
require_once '../../vendor/autoload.php';
require_once 'secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);
$endpoint_secret = 'whsec_0j5qjxlcAXRnfJk71bZWeaZlQ4ZPyHdh';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
} catch (\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
} catch (\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    http_response_code(400);
    exit();
}

// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event; // contains a \Stripe\PaymentIntent
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
        'title' => 'Makseteavitus',
        'description' => "UCP-st telliti coine!\n\nSumma: " . number_format($paymentIntent->data->object->amount / 100, 2) . "€\nDiscord ID: <@{$paymentIntent->data->object->metadata->discord_id}>\n",
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


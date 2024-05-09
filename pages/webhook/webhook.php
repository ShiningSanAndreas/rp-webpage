<?php
require_once '../../vendor/autoload.php';
require_once 'secrets.php';
require_once '../../config.php';

// Establish database connection
try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Database connection error: ' . $e->getMessage());
    http_response_code(500); // Internal Server Error
    exit();
}

// Initialize Stripe
\Stripe\Stripe::setApiKey($stripeSecretKey);
$endpoint_secret = 'whsec_0j5qjxlcAXRnfJk71bZWeaZlQ4ZPyHdh';

// Get the payload and signature
$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
} catch (\UnexpectedValueException $e) {
    http_response_code(400);
    exit();
} catch (\Stripe\Exception\SignatureVerificationException $e) {
    http_response_code(400);
    exit();
}

// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event;
        handlePaymentIntentSucceeded($paymentIntent, $db);
        session_reset();
        break;
    default:
        error_log('Received unknown event type: ' . $event->type);
        break;
}

// Respond with success
http_response_code(200);

function handlePaymentIntentSucceeded($paymentIntent, $db) {
    $discord_id = $paymentIntent->data->object->metadata->discord_id;
    $coin_amount = $paymentIntent->data->object->metadata->coin_amount;

    updateUserCoinBalance($discord_id, $coin_amount, $db);
    sendDiscordNotification($paymentIntent);
}

function updateUserCoinBalance($discord_id, $coin_amount, $db) {
    try {
        $query = $db->prepare("UPDATE ucp_users SET balance = balance + :coin_amount WHERE discord_id = :discord_id");
        $query->bindParam(':discord_id', $discord_id, PDO::PARAM_STR);
        $query->bindParam(':coin_amount', $coin_amount, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() == 0) {
            error_log("No rows updated for discord_id: $discord_id");
        } else {
            error_log("Updated balance for discord_id: $discord_id with coin_amount: $coin_amount");
        }
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
    }
}

function sendDiscordNotification($paymentIntent) {
    $webhookURL = 'https://discord.com/api/webhooks/1201523735874785321/p7C-eSwpwETu7nL70ASGZpqwX2OJKg-icskvK4JJ9FFewu4gmGhyd4VOXNgWhwsH1FJ8';

    $embed = [
        'title' => 'Makseteavitus',
        'description' => "UCP-st telliti coine!\n\nSumma: " . number_format($paymentIntent->data->object->amount / 100, 2) . "€\nDiscord ID: <@{$paymentIntent->data->object->metadata->discord_id}>\n",
        'color' => hexdec('00FF00'),
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
        error_log('Error sending Discord notification');
    }
}
?>

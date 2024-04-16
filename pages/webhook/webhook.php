
<?php
require_once '../../vendor/autoload.php';
require_once 'secrets.php';
require_once '../../config.php';

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
  }

$stripe = new \Stripe\StripeClient($stripeSecretKey);
$endpoint_secret = 'whsec_0j5qjxlcAXRnfJk71bZWeaZlQ4ZPyHdh';

\Stripe\Stripe::setApiKey('sk_test_51OXMazJYQ5I7nITlmDc3WDHEUwgHYfTYTguuip7fs5bUTaRRv7jNEvpq6wT3cidrICdZmZuyXVtMYXxTHuES1xO000t7qFwlOA');
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
        handlePaymentIntentSucceeded($paymentIntent, $db);
        session_reset();
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

function handlePaymentIntentSucceeded($paymentIntent, $db) {
    $discord_id = $paymentIntent->data->object->metadata->discord_id;
    //$coin_amount = $paymentIntent->data->object->metadata->coin_amount;

    //$discord_id = '249948813878362112'; 
    $coin_amount = 100; 
    error_log($coin_amount);
    // Call the function
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
            error_log("No rows updated. Check if the discord_id exists and is correct: $discord_id");
        } else {
            error_log("Updated balance for discord_id: $discord_id with coin_amount: $coin_amount");
        }
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
    }
}

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


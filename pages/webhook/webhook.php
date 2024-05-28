<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/secrets.php';
require_once __DIR__ . '../../../config.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
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
\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);
$endpoint_secret = 'whsec_yjazf9bhDO94569van6yMSbifFycLo6V';

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
    addOrderToHistory($paymentIntent, $db);
    sendDiscordNotification($paymentIntent);
}

function updateUserCoinBalance($discord_id, $coin_amount, $db) {
    try {
        $query = $db->prepare("UPDATE ucp_users SET balance = balance + :coin_amount WHERE discord_id = :discord_id");
        $query->bindParam(':discord_id', $discord_id);
        $query->bindParam(':coin_amount', $coin_amount);
        $query->execute();
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
    }
}

// Function to add order data to database history
// table: ucp_orders, values to insert discord_id, price, productName, orderDate (timestamp), purchaseType (should be 'coin')
function addOrderToHistory($paymentIntent, $db) {
    $discord_id = $paymentIntent->data->object->metadata->discord_id;
    $price = $paymentIntent->data->object->amount / 100;
    $productName = $paymentIntent->data->object->metadata->coin_package_name;
    $orderDate = date('Y-m-d H:i:s');
    $purchaseType = 'coin';

    try {
        $query = $db->prepare("INSERT INTO ucp_orders (discord_id, price, productName, orderDate, purchaseType) VALUES (:discord_id, :price, :productName, :orderDate, :purchaseType)");
        $query->bindParam(':discord_id', $discord_id, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->bindParam(':productName', $productName, PDO::PARAM_STR);
        $query->bindParam(':orderDate', $orderDate, PDO::PARAM_STR);
        $query->bindParam(':purchaseType', $purchaseType, PDO::PARAM_STR);
        $query->execute();
    } catch (PDOException $e) {
        $errormsg = 'Database error: ' . $e->getMessage();
        error_log($errormsg);
        sendDiscordErrorNotification($errormsg);
    }
}

function sendDiscordNotification($paymentIntent) {
    $webhookURL = 'https://discord.com/api/webhooks/1240034119182712953/HyOjKEgPPTF74KmDKVuX3kLPkp2WjXiyibtNG5qBCPs_-JaTKiuwNAcIKKiqX-9sQKog';

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

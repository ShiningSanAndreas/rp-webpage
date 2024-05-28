<?php
include("../../config.php");
$webhookUrl = "https://discord.com/api/webhooks/1239548081641357375/ie4rl2XuRoYFP6xr4kxkrjRIL4XEHFYjIaK7iQUUCQOGVsYVKvA-ePkaxvMAiPVgBbsm";

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); 
}

// Input validation
if (!isset($_POST['customProdId']) || !isset($_POST['discordId']) || !isset($_POST['customProdPrice']) || !isset($_POST['customProdTitle'])) {
    $response = array(
        'success' => false,
        'error' => 'Missing required POST data'
    );
    echo json_encode($response);
    exit;
}
// sql injection protection
$customProdId = htmlspecialchars($_POST['customProdId']);
$discordId = htmlspecialchars($_POST['discordId']);
$customProdPrice = htmlspecialchars($_POST['customProdPrice']);
$customProdTitle = htmlspecialchars($_POST['customProdTitle']);

// XSS protection
$customProdId = strip_tags($customProdId);
$discordId = strip_tags($discordId);
$customProdPrice = strip_tags($customProdPrice);
$customProdTitle = strip_tags($customProdTitle);

// Get user balance
$userBalance = getUserBalance($db, $discordId);

// Logic to check does user have enough balance
if ($userBalance < $customProdPrice) {
    $response = array(
        'success' => false,
        'error' => 'Not enough balance'
    );
    echo json_encode($response);
    exit;
}


if ($customProdId === 'customCharacter') {
    $randomCode = generateRandomCode();
    // Insert code to gameserver database
    $sql = "INSERT INTO multichar_tbx (tbx) VALUES (:code)";
    $data = array(':code' => $randomCode);
    insertData($db, $sql, $data);

    removeBalance($db, $discordId, $customProdPrice);
    addOrderToHistory($discordId, $customProdPrice, $customProdTitle . " | Kood: $randomCode", $db);

    $updatedBalance = getUserBalance($db, $discordId);

// Prepare response with updated balance
$responseMessage = "Ostsid edukalt erilise map modi! Toote hind: $customProdPrice | Sinu uus saldo: $updatedBalance";
$response = array(
    'success' => true,
    'message' => $responseMessage,
    'updatedBalance' => $updatedBalance // Include updated balance in the response
);



} elseif ($customProdId === 'customCar') {    
    $embed = [
        'title' => 'E-poest soetati eritellimus sõiduk!',
        'description' => "Tellija: <@{$discordId}>
        Karakter: {$_POST['character']}
        Mod link: {$_POST['prodLink']}
        Lisainfo: {$_POST['additionalComments']}
        ",
        'color' => hexdec('72007a'),
        'timestamp' => date('c')
    ];
    
    // Tag these discord roles on notification (useage: <@&role_id>)
    $roles_tagged = "<@&1239553829352243260>";
    sendEmbedMessage($webhookUrl, $roles_tagged, $embed);
    removeBalance($db, $discordId, $customProdPrice);
    addOrderToHistory($discordId, $customProdPrice, $customProdTitle, $db);

    $updatedBalance = getUserBalance($db, $discordId);

// Prepare response with updated balance
$responseMessage = "Ostsid edukalt erilise map modi! Toote hind: $customProdPrice | Sinu uus saldo: $updatedBalance";
$response = array(
    'success' => true,
    'message' => $responseMessage,
    'updatedBalance' => $updatedBalance // Include updated balance in the response
);


    
} elseif ($customProdId === 'customFurniture') {    
    $embed = [
        'title' => 'E-poest soetati eriline map mod!',
        'description' => "Tellija: <@{$discordId}>
        Karakter: {$_POST['character']}
        Mod link: {$_POST['prodLink']}
        Lisainfo: {$_POST['additionalComments']}
        ",
        'color' => hexdec('05855e'), // purple hex is 0x7289da
        'timestamp' => date('c')
    ];
    
    // Tag these discord roles on notification (useage: <@&role_id>)
    $roles_tagged = "<@&1239910691775975424>";
    sendEmbedMessage($webhookUrl, $roles_tagged, $embed);
    removeBalance($db, $discordId, $customProdPrice);
    addOrderToHistory($discordId, $customProdPrice, $customProdTitle, $db);

    $updatedBalance = getUserBalance($db, $discordId);

// Prepare response with updated balance
$responseMessage = "Ostsid edukalt erilise map modi! Toote hind: $customProdPrice | Sinu uus saldo: $updatedBalance";
$response = array(
    'success' => true,
    'message' => $responseMessage,
    'updatedBalance' => $updatedBalance // Include updated balance in the response
);


    
} elseif ($customProdId === 'nameChange') {
    $character = $_POST['character'];
    // divide last name from first names of character, even tho some can have many first names
    $nameParts = explode(" ", $character);
    $lastName = array_pop($nameParts); 
    $firstName = implode(" ", $nameParts); 
    // sql and XSS protection
    $newFirstName = htmlspecialchars($_POST['charNewFirstname']);
    $newLastName = htmlspecialchars($_POST['charNewLastname']);
    $newFirstName = strip_tags($newFirstName);
    $newLastName = strip_tags($newLastName);
    $stmt = $db->prepare("UPDATE players SET charinfo = JSON_SET(charinfo, '$.firstname', :newFirstName, '$.lastname', :newLastName) WHERE JSON_EXTRACT(charinfo, '$.firstname') = :firstName AND JSON_EXTRACT(charinfo, '$.lastname') = :lastName");
    $stmt->bindParam(':newFirstName', $newFirstName);
    $stmt->bindParam(':newLastName', $newLastName);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->execute();


    removeBalance($db, $discordId, $customProdPrice);
    addOrderToHistory($discordId, $customProdPrice, $customProdTitle, $db);

    $updatedBalance = getUserBalance($db, $discordId);

// Prepare response with updated balance
$responseMessage = "Ostsid edukalt erilise map modi! Toote hind: $customProdPrice | Sinu uus saldo: $updatedBalance";
$response = array(
    'success' => true,
    'message' => $responseMessage,
    'updatedBalance' => $updatedBalance // Include updated balance in the response
);



} else {
    // If customProdId is invalid, return an error message
    $response = array(
        'success' => false,
        'error' => 'Invalid customProdId'
    );
}

// Send the response as JSON
echo json_encode($response);


// Function To send embed message to discord - For Developers
function sendEmbedMessage($webhookUrl, $roleTags, $embed) {
    $data = json_encode(['content' => $roleTags , 'embeds' => [$embed]]);
    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ]);
    $result = curl_exec($ch);
}

// Function To Generate a random code, should be 16 characters long
function generateRandomCode($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomCode;
}

// Function to insert data in the database with sql query coming from function call
function insertData($db, $sql, $data) {
    $stmt = $db->prepare($sql);
    foreach ($data as $key => $value) {
        $stmt->bindParam($key, $value);
    }
    $stmt->execute();
}

// Function to set new user balance to database
function removeBalance($db, $discordId, $customProdPrice) {
    $stmt = $db->prepare("UPDATE ucp_users SET balance = balance - :customProdPrice WHERE discord_id = :discordId");
    $stmt->bindParam(':discordId', $discordId);
    $stmt->bindParam(':customProdPrice', $customProdPrice);
    $stmt->execute();
}

// function to get user balance
function getUserBalance($db, $discordId) {
    $stmt = $db->prepare("SELECT balance FROM ucp_users WHERE discord_id = :discordId");
    $stmt->bindParam(':discordId', $discordId);
    $stmt->execute();
    return $stmt->fetchColumn();
}

// function to add purchases to database history
function addOrderToHistory($discord_id, $price, $productName, $db) {
    $orderDate = date('Y-m-d H:i:s');
    $purchaseType = 'service';

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
?>
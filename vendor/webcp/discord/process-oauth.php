<?php
include("../../../config.php");


try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

if (!isset($_GET['code'])) {
    echo 'No code';
    exit;
}

$discord_code = $_GET['code'];

$payload = [
    'code' => $discord_code,
    'client_id' => $discordClientId,
    'client_secret' => $discordClientSecret,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $discordRedirectUri,
    'scope' => 'identify%20guids',
];

$payload_string = http_build_query($payload);
$discord_token_url = 'https://discordapp.com/api/oauth2/token';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $discord_token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // DEV ONLY CHANGE IT
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // DEV ONLY CHANGE IT

$result = curl_exec($ch);

if (!$result) {
    echo 'Curl error: ' . curl_error($ch);
}

$result = json_decode($result, true);

if (isset($result['access_token'])) {
    $access_token = $result['access_token'];

    $discord_users_url = 'https://discordapp.com/api/users/@me';
    $header = ["Authorization: Bearer $access_token", 'Content-Type: application/x-www-form-urlencoded'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_URL, $discord_users_url);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // DEV ONLY CHANGE IT
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // DEV ONLY CHANGE IT

    $result = curl_exec($ch);

    $result = json_decode($result, true);

    // Check if the user already exists in your database
    $discord_id = $result['id'];
    $user_exists = userExistsInDatabase($discord_id, $db); // Pass the database connection

    if (!$user_exists) {
        // User doesn't exist, create a new database entry
        createUserInDatabase($result, $db); // Pass the database connection
    }

    // Check if the user is whitelisted
    $is_whitelisted = isUserWhitelisted($discord_id, $db); // Pass the database connection

    session_start();

        // User is not whitelisted, redirect to the whitelist form
        $_SESSION['logged_in'] = true;
        $_SESSION['userData'] = [
            'name'=> $result['username'],
            'discord_id'=> $result['id'],
            'avatar'=>$result['avatar'],
            'global_name'=> $result['global_name'],
        ];
        header('Location: ../../../home.php');
    

    exit();

} else {
    // Handle the case where 'access_token' is not present in the response.
    echo 'Access token not found in the response.';
}

// Functions to interact with the database using prepared statements
function userExistsInDatabase($discord_id, $db) {
    $query = $db->prepare("SELECT COUNT(*) as count FROM ucp_users WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['count'] > 0;
}

function isUserWhitelisted($discord_id, $db) {
    $query = $db->prepare("SELECT is_whitelisted FROM ucp_users WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return (bool)$result['is_whitelisted'];
}

function createUserInDatabase($user_data, $db) {
    $discord_id = $user_data['id'];
    $discord_username = $user_data['username'];

    $is_whitelisted = 0;
    $balance = 0;

    $query = $db->prepare("INSERT INTO ucp_users (discord_id, discord_username, is_whitelisted, balance) 
              VALUES (:discord_id, :discord_username, :is_whitelisted, :balance)");
    $query->bindParam(':discord_id', $discord_id);
    $query->bindParam('discord_username', $discord_username);
    $query->bindParam(':is_whitelisted', $is_whitelisted);
    $query->bindParam(':balance', $balance);

    $query->execute();
}

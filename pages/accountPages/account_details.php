<?php
include("../../config.php");
session_start();

extract($_SESSION["userData"]);

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
  } 

$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<div class="flex flex-wrap justify-between">
    <!-- User Profile Card -->
    <div class="w-1/3 bg-primary shadow-md rounded p-4">
        <img src="<?= $avatar_url ?>" alt="Profile Image" class="h-24 w-24 rounded-full mx-auto">
        <div class="text-center mt-2 text-tekst">
            <p class="text-lg"><?= $global_name ?></p>
            <p class="text-sm text-gray-600">disc ID:</p>
        </div>
    </div>

    <!-- Stripe Payment Details -->
    <div class="w-1/3 bg-primary shadow-md rounded p-4">
        <div class="mb-4 text-tekst">
            <h4 class="text-lg font-bold">Stripe maksmise detailid vb</h4>
            <p>Name</p>
            <p>Email:</p>
        </div>
    </div>
</div>

<!-- List of Characters -->
<div class="w-full bg-white shadow-md rounded p-4 mt-4">
    <h4 class="text-lg font-bold mb-3">Your Characters</h4>
    <ul>
    </ul>
</div>

</body>
</html>


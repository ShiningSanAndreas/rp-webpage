<?php
include("../../config.php");
session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if ($isLoggedIn) {
    extract($_SESSION["userData"]);
}

$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
$discord_id = $_SESSION['userData']['discord_id'];

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
            <p class="text-sm text-gray-600">Discord ID: <?= $discord_id ?></p>
        </div>
    </div>
</div>

</body>
</html>

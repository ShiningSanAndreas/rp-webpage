<?php
include("../../config.php");
session_start();

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); 
}
$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if ($isLoggedIn) {
    extract($_SESSION["userData"]);
}

$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
$discord_id = $_SESSION['userData']['discord_id'];

$characterData = getUserCharacters($discord_id, $db);
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
<div class="w-full pt-16 text-tekst ">
    <h2 class="text-2xl font-bold mb-4">Character Details</h2>
    <?php if (!empty($characterData)): ?>
        <ul>
            <?php foreach ($characterData as $character):
                $charinfo = json_decode($character['charinfo'], true);
                $jobinfo = json_decode($character['job'], true);
            ?>
            <li>
                <?= htmlspecialchars($charinfo['firstname']) ?> <?= htmlspecialchars($charinfo['lastname']) ?>
                - CitizenID: <?= htmlspecialchars($character['citizenid']) ?>
                - Job: <?= htmlspecialchars($jobinfo['label']) ?> (<?= htmlspecialchars($jobinfo['grade']['name']) ?>)
            </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No characters have been created yet.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php
function getUserCharacters($discord_id, $db)
{
    $query = $db->prepare("SELECT * FROM players WHERE discord = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
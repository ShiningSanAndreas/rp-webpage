<?php
include("../config.php");

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if (!$isLoggedIn) {
    header("Location: landing.php");
    exit();
}
extract($_SESSION["userData"]);

$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
$current_page = "characters";

$characterData = getUserCharacters($discord_id, $db);

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Karakterid - ShiningRP</title>
</head>

<?php include("./modules/navbar.php") ?>

<body class="bg-background">

    <div class="ml-auto mb-6 max-w-screen-lg mx-auto">
        <div class="text-white my-16 flex">
            <h2 class="text-5xl font-bold">Karakterid</h2>
        </div>
        <div class="flex flex-row flex-wrap justify-center mb-24">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <?php if ($i < count($characterData)): ?>
                    <?php $character = $characterData[$i]; ?>
                    <?php $charinfo = json_decode($character['charinfo'], true); ?>
                    <?php $jobinfo = json_decode($character['job'], true); ?>
                    <?php $moneyinfo = json_decode($character['money'], true); ?>
                    <?php $playtimeFormatted = floor($character['playtime'] / 3600) . ' Hours ' . floor(($character['playtime'] % 3600) / 60) . ' Minutes'; ?>
                    <!-- First Character Container -->
                    <div
                        class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8 mb-8">
                        <img src="../assets/lisakarakter.png" alt="Char card"
                            class="p-4 w-72 h-64 object-cover object-top" />
                        <div class="text-white text-center">
                            <p class="text-2xl font-bold"><?= $charinfo['firstname'] ?>, <?= $charinfo['lastname'] ?></p>
                            <p class="text-md">Sünniaeg: {user.reg}</p>
                            <p class="text-md">Isikukood: <?= $character['citizenid'] ?></p>
                            <p class="text-md">Amet: <?= $jobinfo['label'] ?>, <?= $jobinfo['grade']['name'] ?></p>
                            <p class="text-md">Sularaha: $<?= $moneyinfo['cash'] ?></p>
                            <p class="text-md">Pangas: $<?= $moneyinfo['bank'] ?></p>
                            <p class="text-md mt-12">Kriminimi: criminal</p>
                            <p class="text-md mb-4">Jõuk: gang</p>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Second Character Container -->
                    <div
                        class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8 mb-8 blur-sm">
                        <img src="../assets/lisakarakter.png" alt="Char card blurred"
                            class="p-4 w-72 h-64 object-cover object-top" />
                        <div class="text-white text-center">
                            <p class="text-2xl font-bold">firstName, lastName</p>
                            <p class="text-md">Sünniaeg: dob</p>
                            <p class="text-md">Isikukood: id</p>
                            <p class="text-md">Amet: job</p>
                            <p class="text-md">Sularaha: cash</p>
                            <p class="text-md">Pangas: bank</p>
                            <p class="text-md mt-12">Kriminimi: criminal</p>
                            <p class="text-md mb-4">Jõuk: gang</p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

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
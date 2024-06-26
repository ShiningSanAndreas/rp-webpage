<?php
require  __DIR__ . '/../config.php';

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if (!$isLoggedIn) {
    header("Location: /login");
    exit();
}
extract($_SESSION["userData"]);

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

<?php require __DIR__ . "/./modules/navbar.php" ?>

<body class="bg-background">

    <div class="ml-auto mb-6 max-w-screen-lg mx-auto p-4 lg:p-0">
        <div class="text-white my-16 flex-col">
            <h2 class="text-2xl font-nihilist italic">Karakterid</h2>
            <p class="pt-4 text-gray-200">Siin näed oma mängus tehtud karaktereid, lisakaraktereid saab osta <u><a href="shop" class="text-light">SIIT</a></u></p>
        </div>
        <div class="flex flex-row flex-wrap justify-center mb-24">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <?php if ($i < count($characterData)): ?>
                    <?php $character = $characterData[$i]; ?>
                    <?php $charinfo = json_decode($character['charinfo'], true); ?>
                    <?php $jobinfo = json_decode($character['job'], true); ?>
                    <?php $moneyinfo = json_decode($character['money'], true); ?>
                    <?php $charPic = ($character['mugshot']); ?>
                    <?php $playtimeFormatted = floor($character['playtime'] / 3600) . ' Hours ' . floor(($character['playtime'] % 3600) / 60) . ' Minutes'; ?>
                    <!-- First Character Container -->
                    <div
                        class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto md:p-2 lg:mr-8 mb-8">
                        <img src="<?= $charPic ?>" alt="<?= $charPic ?>"
                            class="p-4 w-72 h-64 object-cover object-top" />
                        <div class="text-white text-center mb-6">
                            <p class="text-2xl font-bold"><?= htmlspecialchars($charinfo['firstname']) ?>, <?= htmlspecialchars($charinfo['lastname']) ?></p>
                            <p class="text-md">Sünniaeg: {user.reg}</p>
                            <p class="text-md">Isikukood: <?= htmlspecialchars($character['citizenid']) ?></p>
                            <p class="text-md">Amet: <?= htmlspecialchars($jobinfo['label']) ?>, <?= htmlspecialchars($jobinfo['grade']['name']) ?></p>
                            <p class="text-md">Sularaha: $<?= htmlspecialchars($moneyinfo['cash']) ?></p>
                            <p class="text-md">Pangas: $<?= htmlspecialchars($moneyinfo['bank']) ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Blurred Character Container -->
                    <div
                        class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto sm:mr-6 lg:mr-8 mb-8 blur-sm select-none disabled" >
                        <img src="../assets/lisakarakter.png" alt="Char card blurred"
                            class="p-4 w-72 h-64 object-cover object-top" />
                        <div class="text-white text-center mb-6">
                            <p class="text-2xl font-bold">firstName, lastName</p>
                            <p class="text-md">Sünniaeg: dob</p>
                            <p class="text-md">Isikukood: id</p>
                            <p class="text-md">Amet: job</p>
                            <p class="text-md">Sularaha: cash</p>
                            <p class="text-md">Pangas: bank</p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>

</body>
<?php require __DIR__ . "/./modules/footer.php" ?>

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
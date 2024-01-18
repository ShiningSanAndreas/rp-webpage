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

    <div class="ml-auto mb-6 lg:w-[70%] xl:w-[75%] 2xl:w-[85%] mx-auto">
        <div class="text-white mt-16 mb-6">
            <h2 class="text-5xl font-semibold">Karakterid</h2>
        </div>
        <div class="flex flex-row justify-center mb-24">

            <!-- First Character Container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8">
                <img src="../assets/lisakarakter.png" alt="Pood Custom Car" class="p-4 w-72 h-64 object-cover object-top"/>
                <div class="text-white text-center">
                    <p class="text-2xl font-bold">firstName, lastName</p>
                    <p class="text-md">Sünniaeg: {user.reg}</p>
                    <p class="text-md">Isikukood: {id}</p>
                    <p class="text-md">Amet: {user.job}, {user.jobGrade}</p>
                    <p class="text-md">Sularaha: {user.cash}</p>
                    <p class="text-md">Pangas: {user.bank}</p>
                    <p class="text-md mt-12">Kriminimi: {user.criminal}</p>
                    <p class="text-md mb-4">Jõuk: {user.affiliatedGang}</p>
                </div>
            </div>

            <!-- Second Character Container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8 blur-sm">
                <img src="../assets/lisakarakter.png" alt="Pood Custom Car" class="p-4 w-72 h-64 object-cover object-top" />
                <div class="text-white text-center">
                    <p class="text-2xl font-bold">firstName, lastName</p>
                    <p class="text-md">Sünniaeg: {user.reg}</p>
                    <p class="text-md">Isikukood: {id}</p>
                    <p class="text-md">Amet: {user.job}, {user.jobGrade}</p>
                    <p class="text-md">Sularaha: {user.cash}</p>
                    <p class="text-md">Pangas: {user.bank}</p>
                    <p class="text-md mt-12">Kriminimi: {user.criminal}</p>
                    <p class="text-md mb-4">Jõuk: {user.affiliatedGang}</p>
                </div>
            </div>

            <!-- Third Character Container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8 blur-sm">
                <img src="../assets/lisakarakter.png" alt="Pood Custom Car" class="p-4 w-72 h-64 object-cover object-top" />
                <div class="text-white text-center">
                    <p class="text-2xl font-bold">firstName, lastName</p>
                    <p class="text-md">Sünniaeg: {user.reg}</p>
                    <p class="text-md">Isikukood: {id}</p>
                    <p class="text-md">Amet: {user.job}, {user.jobGrade}</p>
                    <p class="text-md">Sularaha: {user.cash}</p>
                    <p class="text-md">Pangas: {user.bank}</p>
                    <p class="text-md mt-12">Kriminimi: {user.criminal}</p>
                    <p class="text-md mb-4">Jõuk: {user.affiliatedGang}</p>
                </div>
            </div>

            <!-- Fourth Character Container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8 blur-sm">
                <img src="../assets/lisakarakter.png" alt="Pood Custom Car" class="p-4 w-72 h-64 object-cover object-top" />
                <div class="text-white text-center">
                    <p class="text-2xl font-bold">firstName, lastName</p>
                    <p class="text-md">Sünniaeg: {user.reg}</p>
                    <p class="text-md">Isikukood: {id}</p>
                    <p class="text-md">Amet: {user.job}, {user.jobGrade}</p>
                    <p class="text-md">Sularaha: {user.cash}</p>
                    <p class="text-md">Pangas: {user.bank}</p>
                    <p class="text-md mt-12">Kriminimi: {user.criminal}</p>
                    <p class="text-md mb-4">Jõuk: {user.affiliatedGang}</p>
                </div>
            </div>

            <!-- Fifth Character Container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto mr-8 blur-sm">
                <img src="../assets/lisakarakter.png" alt="Pood Custom Car" class="p-4 w-72 h-64 object-cover object-top" />
                <div class="text-white text-center">
                    <p class="text-2xl font-bold">firstName, lastName</p>
                    <p class="text-md">Sünniaeg: {user.reg}</p>
                    <p class="text-md">Isikukood: {id}</p>
                    <p class="text-md">Amet: {user.job}, {user.jobGrade}</p>
                    <p class="text-md">Sularaha: {user.cash}</p>
                    <p class="text-md">Pangas: {user.bank}</p>
                    <p class="text-md mt-12">Kriminimi: {user.criminal}</p>
                    <p class="text-md mb-4">Jõuk: {user.affiliatedGang}</p>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>

<?php

function getAllPlayersMoney($db)
{
    $query = $db->prepare("SELECT money FROM players");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    // Initialize the total money to 0
    $totalMoney = 0;

    // Loop through the results and accumulate the money
    foreach ($results as $row) {
        $money = json_decode($row["money"], true);
        if (isset($money["bank"])) {
            $totalMoney += $money["bank"];
        }
        if (isset($money["cash"])) {
            $totalMoney += $money["cash"];
        }
    }

    return $totalMoney;
}

function getAllPlayers($db)
{
    $query = $db->prepare("SELECT cid FROM players");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    $totalCharacterCount = 0;

    foreach ($results as $row) {
        foreach ($row as $key => $value) {
            $totalCharacterCount += strlen($value);
        }
    }

    return $totalCharacterCount;
}


function getUserBalance($discord_id, $db)
{
    $query = $db->prepare("SELECT balance FROM ucp_users WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result["balance"];
}

function isUserWhitelisted($discord_id, $db)
{
    $query = $db->prepare("SELECT COUNT(*) as count FROM player_whitelists WHERE identifier = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['count'] > 0;
}
function getUserCharacters($discord_id, $db)
{
    $query = $db->prepare("SELECT * FROM players WHERE discord = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
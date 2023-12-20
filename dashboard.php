<?php
include("config.php");

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}



session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if(!$isLoggedIn) {
    header("Location: landing.php");
    exit();
}
extract($_SESSION["userData"]);

$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
$current_page = "dashboard";

$players_money = getAllPlayersMoney($db);
$_SESSION["userBalance"] = getUserBalance($discord_id, $db);
$_SESSION["whitelist_status"] = isUserWhitelisted($discord_id, $db);
$players_total = getAllPlayers($db);
$characterData = getUserCharacters($discord_id, $db);



?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-800	">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-gray lg:py-2.5 border-gray-950">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-zinc-300 font-medium lg:block">Avaleht</h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex space-x-4">


                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1.25em"
                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #bfbfbf
                            }
                        </style>
                        <path
                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                    </svg>
                    <p class=" text-zinc-300">
                        <?php echo $_SESSION["userBalance"]; ?> coins
                    </p>
                </div>
            </div>
        </div>

        <div class="px-6 pt-6 2xl:container">

            <div class="flex flex-wrap justify-center items-center">
                <?php for($i = 0; $i < 5; $i++): ?>
                    <?php if($i < count($characterData)): ?>
                        <?php $character = $characterData[$i]; ?>
                        <?php $charinfo = json_decode($character['charinfo'], true); ?>
                        <?php $jobinfo = json_decode($character['job'], true); ?>
                        <?php $moneyinfo = json_decode($character['money'], true); ?>
                        <?php $playtimeFormatted = floor($character['playtime'] / 3600).' Hours '.floor(($character['playtime'] % 3600) / 60).' Minutes'; ?>

                        <div class="text-gray-300 rounded-lg text-sm w-[350px] bg-[#161b22] border border-[#3f3f46] m-4">
                            <div class="w-full flex flex-row space-x-3 p-4">
                                <img class="rounded-2xl border-zinc-700 w-16 h-16" alt="<?= $character['name'] ?>"
                                    src=data:image/png;base64,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 />
                                <div class="w-full text-gray-500">
                                    <p
                                        class="w-[200px] text-lg space-x-1 inline-block overflow-hidden whitespace-nowrap text-ellipsis">
                                        <span class="text-gray-100">
                                            <?= $charinfo['firstname'] ?>
                                            <?= $charinfo['lastname'] ?>
                                        </span><span class="font-extralight text-sm">
                                            <?= $character['citizenid'] ?>
                                        </span>
                                    </p>
                                    <p>
                                        <?= $jobinfo['label'] ?> (
                                        <?= $jobinfo['grade']['name'] ?>)
                                    </p>
                                </div>
                            </div>

                            <div class="w-full border-b border-[#3f3f46]"></div>

                            <div class="w-full flex-col space-y-1 p-4 text-gray-500 text-sm">
                                <div class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                        <path
                                            d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM128 416H64V352c35.3 0 64 28.7 64 64zM64 224V160h64c0 35.3-28.7 64-64 64zM448 352c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM252 208c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z" />

                                    </svg>
                                    <p class="text-gray-100">
                                        $
                                        <?= $moneyinfo['cash'] ?>
                                    </p>
                                </div>
                                <div v-if="infos.company" class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path
                                            d="M240.1 4.2c9.8-5.6 21.9-5.6 31.8 0l171.8 98.1L448 104l0 .9 47.9 27.4c12.6 7.2 18.8 22 15.1 36s-16.4 23.8-30.9 23.8H32c-14.5 0-27.2-9.8-30.9-23.8s2.5-28.8 15.1-36L64 104.9V104l4.4-1.6L240.1 4.2zM64 224h64V416h40V224h64V416h48V224h64V416h40V224h64V420.3c.6 .3 1.2 .7 1.8 1.1l48 32c11.7 7.8 17 22.4 12.9 35.9S494.1 512 480 512H32c-14.1 0-26.5-9.2-30.6-22.7s1.1-28.1 12.9-35.9l48-32c.6-.4 1.2-.7 1.8-1.1V224z" />

                                    </svg>
                                    <p class="text-gray-100">
                                        $
                                        <?= $moneyinfo['bank'] ?>
                                    </p>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path
                                            d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                    </svg>
                                    <p class="text-gray-100">
                                        <?= $playtimeFormatted ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php if($i % 2 == 1): ?>
                        </div>
                        <div class="flex flex-wrap justify-center items-center">
                        <?php endif; ?>

                    <?php else: ?>
                        <div class="relative">
                            <!-- Lock Icon -->
<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
    <!-- Add your lock icon SVG or HTML here -->
    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
</div>

                        <div class="text-gray-300 rounded-lg text-sm w-[350px] bg-[#161b22] border border-[#3f3f46] m-4">
                            <div class="blur">

                            <div class="w-full flex flex-row space-x-3 p-4">
                                <img class="rounded-2xl border-zinc-700 w-16 h-16" alt="<?= $character['name'] ?>"
                                    src="https://avatars.githubusercontent.com/u/65394410?v=4" />
                                <div class="w-full text-gray-500">
                                    <p
                                        class="w-[200px] text-lg space-x-1 inline-block overflow-hidden whitespace-nowrap text-ellipsis">
                                        <span class="text-gray-100">
                                            Eesnimi Perenimi
                                        </span><span class="font-extralight">
                                            Isikukood
                                        </span>
                                    </p>
                                    <p>
                                        jobname (jobgrade)
                                    </p>
                                </div>
                            </div>

                            <div class="w-full border-b border-[#3f3f46]"></div>

                            <div class="w-full flex-col space-y-1 p-4 text-gray-500 text-sm">
                                <div class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                        <path
                                            d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM128 416H64V352c35.3 0 64 28.7 64 64zM64 224V160h64c0 35.3-28.7 64-64 64zM448 352c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM252 208c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z" />
                                    </svg>
                                    <p class="text-gray-100">
                                        cash
                                    </p>
                                </div>
                                <div v-if="infos.company" class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path
                                            d="M240.1 4.2c9.8-5.6 21.9-5.6 31.8 0l171.8 98.1L448 104l0 .9 47.9 27.4c12.6 7.2 18.8 22 15.1 36s-16.4 23.8-30.9 23.8H32c-14.5 0-27.2-9.8-30.9-23.8s2.5-28.8 15.1-36L64 104.9V104l4.4-1.6L240.1 4.2zM64 224h64V416h40V224h64V416h48V224h64V416h40V224h64V420.3c.6 .3 1.2 .7 1.8 1.1l48 32c11.7 7.8 17 22.4 12.9 35.9S494.1 512 480 512H32c-14.1 0-26.5-9.2-30.6-22.7s1.1-28.1 12.9-35.9l48-32c.6-.4 1.2-.7 1.8-1.1V224z" />
                                    </svg>
                                    <p class="text-gray-100">
                                        bank
                                    </p>
                                </div>
                                <div v-if="infos.company" class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path
                                            d="M240.1 4.2c9.8-5.6 21.9-5.6 31.8 0l171.8 98.1L448 104l0 .9 47.9 27.4c12.6 7.2 18.8 22 15.1 36s-16.4 23.8-30.9 23.8H32c-14.5 0-27.2-9.8-30.9-23.8s2.5-28.8 15.1-36L64 104.9V104l4.4-1.6L240.1 4.2zM64 224h64V416h40V224h64V416h48V224h64V416h40V224h64V420.3c.6 .3 1.2 .7 1.8 1.1l48 32c11.7 7.8 17 22.4 12.9 35.9S494.1 512 480 512H32c-14.1 0-26.5-9.2-30.6-22.7s1.1-28.1 12.9-35.9l48-32c.6-.4 1.2-.7 1.8-1.1V224z" />
                                    </svg>
                                    <p class="text-gray-100">
                                        bank
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                        </div>
                        <?php if($i % 2 == 1): ?>
                        </div>
                        <div class="flex flex-wrap justify-center items-center">
                        <?php endif; ?>
                    <?php endif; ?>

                <?php endfor; ?>
            </div>

        </div>
    </div>
</body>

</html>

<?php

function getAllPlayersMoney($db) {
    $query = $db->prepare("SELECT money FROM players");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    // Initialize the total money to 0
    $totalMoney = 0;

    // Loop through the results and accumulate the money
    foreach($results as $row) {
        $money = json_decode($row["money"], true);
        if(isset($money["bank"])) {
            $totalMoney += $money["bank"];
        }
        if(isset($money["cash"])) {
            $totalMoney += $money["cash"];
        }
    }

    return $totalMoney;
}

function getAllPlayers($db) {
    $query = $db->prepare("SELECT cid FROM players");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    $totalCharacterCount = 0;

    foreach($results as $row) {
        foreach($row as $key => $value) {
            $totalCharacterCount += strlen($value);
        }
    }

    return $totalCharacterCount;
}


function getUserBalance($discord_id, $db) {
    $query = $db->prepare("SELECT balance FROM ucp_users WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result["balance"];
}

function isUserWhitelisted($discord_id, $db) {
    $query = $db->prepare("SELECT COUNT(*) as count FROM player_whitelists WHERE identifier = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['count'] > 0;
}
function getUserCharacters($discord_id, $db) {
    $query = $db->prepare("SELECT * FROM players WHERE discord = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
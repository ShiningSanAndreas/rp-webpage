<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link  href="../styles/output.css" rel="stylesheet"/>
</head>

<body class="bg-background">
    <?php include("navbar.php") ?>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

        <div class="px-6 pt-6 2xl:container">


            <div class="text-gray-300 rounded-lg text-sm w-[350px] bg-accent border border-black m-4">
                <div>
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
                    <div class="w-full border-b border-black"></div>
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
    </div>
    <div class="flex flex-wrap justify-center items-center">
    </div>
</body>

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
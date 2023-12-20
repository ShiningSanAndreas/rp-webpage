<?php
include("../config.php");
session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if (!$isLoggedIn) {
    header("Location: ../landing.php");
    exit();
}

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

extract($_SESSION["userData"]);
$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";

if (!in_array($_SESSION["userData"]["discord_id"], $adminIds)) {
    header("Location: unauthorized.php");
    exit();
}

$current_page = "review";
include('../components/admin_sidebar.php');

function getUsers($db) {
    $query = $db->prepare("SELECT * FROM ucp_forms");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        
        return $result;
    } else {
        // Handle the case where the user is not found in the database.
        // You can return false or any other value as needed.
        return false;
    }
}

$users = getUsers($db);
function getStatusColor($status) {
    switch ($status) {
        case 'Pending':
            return 'gray';
        case 'Accepted':
            return 'green';
        case 'Declined':
            return 'red';
        default:
            return 'transparent';
    }
}




?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">


    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-gray lg:py-2.5 border-gray-950">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-zinc-300 font-medium lg:block">Shining San Andreas Admin Panel</h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex space-x-4">


                    
                    
                <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#bfbfbf}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>                    <p class=" text-zinc-300"><?php echo $_SESSION["userBalance"]; ?> coins</p>
                </div>
            </div>
        </div>

        <div class="px-6 pt-6 2xl:container">


    <!-- component -->
<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
        <div class="mt-8 bg-gray-800 p-6 rounded-lg">
               
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal text-zinc-300">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Kasutaja
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Avaldus
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Liik
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full"
                                    src="<?php echo $user['avatar'] ?>" alt="" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                   <?= $user['senderDiscord'] ?>
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap"><?= $user['application'] ?></p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                        <?= $user['type'] ?>
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <span class="relative inline-block px-3 py-1 font-semibold text-<?= getStatusColor($user['status']) ?>-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-<?= getStatusColor($user['status']) ?>-200 opacity-50 rounded-full"></span>
                            <span class="relative"><?= $user['status'] ?></span>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="px-5 py-5 bg-gray-800 border-t flex flex-col xs:flex-row items-center xs:justify-between text-zinc-300">
        <span class="text-xs xs:text-sm">
            Showing 1 to <?= count($users) ?> of <?= count($users) ?> Entries
        </span>
        <div class="inline-flex mt-2 xs:mt-0">
            <button class="text-sm bg-gray-600 hover:bg-gray-700 text-zinc-300 font-semibold py-2 px-4 rounded-l">
                Prev
            </button>
            <button class="text-sm bg-gray-600 hover:bg-gray-700 text-zinc-300 font-semibold py-2 px-4 rounded-r">
                Next
            </button>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</body>


        

        </div>
</body>
</html>

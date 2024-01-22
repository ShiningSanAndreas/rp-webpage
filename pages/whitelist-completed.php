<?php
include("config.php");
session_start();

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

extract($_SESSION["userData"]);
$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
$current_page = "whitelist";

if (!$_SESSION["quiz_completed"]) {
    header("Location: ../404/error.php"); // Redirect to an error page if the quiz is not completed
    exit();
}

$timer_from_db = getWhitelistTimer($discord_id, $db);
$isWhitelisted = ($_SESSION["score"] >= 10) ? 1 : 0;

if ($_SESSION["score"] >= 10) {
    // If the user has answered at least 10 questions correctly, set is_whitelisted to 1 in the database.
    $sql = "UPDATE ucp_users SET is_whitelisted = 1 WHERE discord_id = :discord_id"; // Replace 'your_table_name' with your actual table name.
} else {
    // If the user has answered less than 10 questions correctly, set is_whitelisted to 0 in the database.
    $sql = "UPDATE ucp_users SET is_whitelisted = 0 WHERE discord_id = :discord_id"; // Replace 'your_table_name' with your actual table name.
}

?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Whitelist valmis - ShiningRP</title>
</head>
<?php include("./modules/navbar.php") ?>

<body class="bg-gray-800	">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-gray lg:py-2.5 border-gray-950">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-zinc-300 font-medium lg:block">Whitelist</h5>
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
            <?php if ($_SESSION["quiz_completed"]): ?>
                <div
                    class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:truncate sm:text-3xl sm:tracking-tight text-center	">
                    <?php if ($_SESSION["score"] >= 10): ?>
                        <p>Läbisid whitelisti edukalt! Edu serveris!</p>
                    <?php else: ?>
                        <div class="grid-rows-2">
                            <p>Ebaõnnestusid whitelisti testi sooritamisel. Valesid vastuseid:
                                <?php echo (10 - $_SESSION["score"]) ?>
                            </p>
                            <p>Testi uuesti suuritamine on võimalik
                                <?php echo gmdate("i:s", ($timer_from_db - time())) ?> minutit pärast.
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <form action="whitelist-form.php" method="post">
                    <div class="p-4 mb-4">
                        <h1
                            class="px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:truncate sm:text-3xl sm:tracking-tight">
                            <?php echo "Küsimus $currentQuestion: " . $currentQuestionData["question"]; ?>
                        </h1>
                        <div class="ml-8 text-lg text-zinc-300">
                            <?php foreach ($currentQuestionData["choices"] as $choice): ?>
                                <input type="radio" name="answer" value="<?php echo $choice; ?>">
                                <?php echo $choice; ?><br>
                            <?php endforeach; ?>
                        </div>
                        <div>
                        </div>
                    </div>

                    <!-- "Next" Button -->
                    <input type="submit" value="Edasi" class="bg-blue-500 text-white text-lg p-2 px-4 ml-12 rounded">
                </form>
            <?php endif; ?>
        </div>
</body>
<?php include("./modules/footer.php") ?>

</html>

<?php
function getWhitelistTimer($discord_id, $db)
{
    $query = $db->prepare("SELECT whitelist_timer FROM ucp_users WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $result = $query->fetch();

    if ($result) {

        return strtotime($result['whitelist_timer']);
    } else {
        // Handle the case where the user is not found in the database.
        // You can return false or any other value as needed.
        return false;
    }
}
?>
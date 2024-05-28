<?php

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];
$isWhitelisted = isset($_SESSION["whitelist_status"]) && $_SESSION["whitelist_status"];

if ($isLoggedIn) {
    extract($_SESSION["userData"]);
}

// Check if the session variables are set 
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
if (isset($_SESSION['correctAnswers']) && isset($_SESSION['incorrectQuestions'])) {
    $correctAnswers = $_SESSION['correctAnswers'];
    $incorrectQuestions = $_SESSION['incorrectQuestions'];


    // Display the data, you can customize this part as needed
    if ($correctAnswers == 10) {
        if (!($isWhitelisted)) {
            insertUserIntoWhitelist($discord_id, $db);
            $_SESSION["whitelist_status"] = true;
        }
    }
}
?>
<div class="max-w-screen-xl p-4 mx-auto text-tekst">
    <?php if (isset($_SESSION['correctAnswers']) && $_SESSION['correctAnswers'] >= 10 or $isWhitelisted): ?>
        <div class="flex flex-col py-16 justify-center items-center">
            <p class="text-3xl font-semibold">Oled whitelisti edukalt läbinud, kohtume serveris!</p>
        </div>

    <?php else: ?>

        <?php if (isset($_SESSION['correctAnswers']) && isset($_SESSION['incorrectQuestions'])): ?>
            <div class="px-2">
                <p class="text-tekst text-xl py-2 font-medium">Vastasid valesti <span class="text-accent">
                        <?php echo (10 - $_SESSION['correctAnswers']); ?>
                    </span> küsimusele.<br>
                </p>
                <p class="px-2 py-1 text-lg text-tekst">
                    <?php foreach ($incorrectQuestions as $question) {
                        echo "- $question<br>";
                    } ?>
                </p>
            </div>
        <?php else: ?>
            <div class="pl-2">
                <p class="text-3xl font-medium">Serveriga liitumiseks täida whitelist. Edu!</p>
            </div>
        <?php endif; ?>
        <form method="post">
            <button
                class="my-8 ml-2 text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center"
                type="submit" name="view" value="quiz">TÄIDA AVALDUS</button>
        </form>
    <?php endif; ?>
</div>

<?php
function insertUserIntoWhitelist($discord_id, $db)
{
   // update is_whitelisted to 1 in ucp_users wher discord_id = $discord_id
    $query = $db->prepare("UPDATE ucp_users SET is_whitelisted = 1 WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    $query->closeCursor();
    
    
}
?>
<!-- lobby.php -->
<?php
$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];
$isWhitelisted = isset($_SESSION["whitelist_status"]) && $_SESSION["whitelist_status"];
echo $isLoggedIn;
echo $isWhitelisted;
if ($isWhitelisted) {
    echo "Whitelisted";
    echo $isWhitelisted;
} else {
        echo "Not Whitelisted";
        echo $isWhitelisted;
    }


if ($isLoggedIn) {
    extract($_SESSION["userData"]);
  }

// Check if the session variables are set
if (isset($_SESSION['correctAnswers']) && isset($_SESSION['incorrectQuestions'])) {
    $correctAnswers = $_SESSION['correctAnswers'];
    $incorrectQuestions = $_SESSION['incorrectQuestions'];
    echo "Correct Answers: $correctAnswers<br>";

    
    // Display the data, you can customize this part as needed
    echo $correctAnswers;
    if ($correctAnswers == 10) {
        if (!($isWhitelisted)) {
        echo "You have completed the quiz!<br>";
        insertUserIntoWhitelist($discord_id, $db);
        $_SESSION["whitelist_status"] = true;
         }
    

    }
    
    if (!empty($incorrectQuestions)) {
        echo "Incorrectly Answered Questions:<br>";
        foreach ($incorrectQuestions as $question) {
            echo "- $question<br>";
        }
    }
} else {
    echo "No quiz results found in session.";
}
?>
<?php if (isset($_SESSION['correctAnswers']) && $_SESSION['correctAnswers'] >= 10 or $isWhitelisted): ?>

    <div>
        <p>Sul on whitelist!</p>
    </div>

<?php else: ?>

    <div>
        <p>Sul puudub whitelist.
            
            <!-- Kontrollib kas eelmise korra kohta on datat -->
        <?php if (isset($_SESSION['correctAnswers']) && isset($_SESSION['incorrectQuestions'])): ?>
            <div> 
        <p class="text-tekst">Vastasid valesti <span class="text-accent"><?php echo (10 - $_SESSION['correctAnswers']); ?></span> küsimusele.<br>
    <?php foreach ($incorrectQuestions as $question) {
            echo "- $question<br>";
        } ?>
</p>   
</div>

    </div>
    <?php endif; ?>


<form method="post">
<button class="m-8 text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center" type="submit" name="view" value="quiz">TÄIDA AVALDUS</button>
</form> 
<?php endif; ?>


<?php
function insertUserIntoWhitelist($discord_id, $db)
{
    $query = $db->prepare("INSERT INTO player_whitelists (identifier) VALUES (:discord_id)");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
}
?>



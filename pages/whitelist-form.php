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
$current_page = "whitelist";


$timer_from_db = getWhitelistTimer($discord_id, $db);


// Define an array for questions and answer choices
$allQuestions = [
    1 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
    2 => [
        "question" => "Õige vastus on A B?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A", "B"],
    ],

    3 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],

    4 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],

    5 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
    6 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
    7 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
    8 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
    9 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
    10 => [
        "question" => "Õige vastus on A?",
        "choices" => ["A", "B", "C", "D"],
        "correct_answer" => ["A"],
    ],
];

// Initialize the score

// Check if the form has been submitted
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the current question number
    $currentQuestion = isset($_SESSION["current_question"]) ? intval($_SESSION["current_question"]) : 0;

    // Check if the answers are submitted
    if (isset($_POST["answers"]) && is_array($_POST["answers"])) {
        $submittedAnswers = $_POST["answers"];
        $currentQuestionData = $_SESSION["questions"][$currentQuestion];
        $correctAnswers = $currentQuestionData["correct_answer"];

        // Check if the submitted answers are correct
        if (count(array_intersect($submittedAnswers, $correctAnswers)) === count($correctAnswers)) {
            $_SESSION["score"]++; // Increment the score
        }

        // Check if this is the last question
        if ($currentQuestion == count($_SESSION["questions"]) - 1) {
            // Mark the quiz as completed
            $_SESSION["quiz_completed"] = true;
        } else {
            // Increment the current question number
            $_SESSION["current_question"] = $currentQuestion + 1;
        }
    }
} else {
    if (($timer_from_db - time()) < 0) {
        // Timer has expired, initialize the quiz session
        $_SESSION["current_question"] = 0;
        $_SESSION["quiz_completed"] = false;
        $_SESSION["score"] = 0;

        // Shuffle the questions and select 10 random ones
        shuffle($allQuestions);
        $_SESSION["questions"] = array_slice($allQuestions, 0, 10);
    } else {
        // Timer still running, perform other actions or display a message
    }
}

if ($_SESSION["quiz_completed"]) {
    $quiz_completion_time = time();
    $create_timer = updateDbTime($discord_id, $db, $quiz_completion_time);
    if ($_SESSION["score"] == count($_SESSION["questions"])) {
        $whitelist_user = whitelistUser($discord_id, $db);
        $_SESSION["whitelist_status"] = true;
    }
}

// Get the current question number and data
$currentQuestion = $_SESSION["current_question"];
$currentQuestionData = $_SESSION["questions"][$currentQuestion];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Whitelist - ShiningRP</title>
</head>
<?php include('./modules/navbar.php') ?>

<body class="bg-background">
    <div class="mb-6 max-w-screen-xl mx-auto">
        <div class="flex items-center my-16">
            <h5 hidden class="text-5xl text-tekst font-bold block">Whitelist</h5>
        </div>

        <div class="pt-6 2xl:container">
            <?php if ($_SESSION["whitelist_status"]): ?>
                <div class="flex justify-center py-8 text-2xl font-bold leading-7 text-tekst sm:text-3xl sm:tracking-tight">
                    <p>Sa oled juba whitelist testi läbinud! Edu serveris!</p>
                </div>

            <?php else: ?>
                <?php if ($_SESSION["quiz_completed"]): ?>
                    <div class="flex justify-center py-8 text-2xl font-bold leading-7 text-tekst sm:text-3xl sm:tracking-tight">
                        <?php if ($_SESSION["score"] >= 10): ?>
                            <p>Läbisid whitelisti edukalt! Edu serveris!</p>
                        <?php else: ?>
                            <p>Ebaõnnestusid whitelisti testi sooritamisel. Valesid vastuseid:
                                <?php echo (10 - $_SESSION["score"]) ?> !

                                <br>Testi uuesti sooritamine on võimalik
                                <?php echo gmdate("i:s", ($timer_from_db - time())) ?> minutit pärast.
                                <script>
                                    setTimeout(function () {
                                        window.location.href = 'whitelist-form.php';
                                    }, <?php echo max(0, $timer_from_db - time()) * 1000; ?>);
                                </script>
                            </p>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (($timer_from_db - time()) >= 0): ?>
                        <p
                            class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-tekst sm:text-3xl sm:tracking-tight text-center">
                            <?php echo (10 - $_SESSION["score"]) ?> !.Uuesti proovimine on võimalik ‎

                            <span id="countdown"></span>
                            <script>
                                // Set the target time for the countdown (in seconds)
                                var targetTime = <?php echo $timer_from_db; ?>;

                                // Function to update the countdown
                                function updateCountdown() {
                                    // Calculate the remaining time in seconds
                                    var remainingTime = Math.max(0, targetTime - Math.floor(Date.now() / 1000));

                                    // Format the remaining time into MM:SS
                                    var minutes = Math.floor(remainingTime / 60);
                                    var seconds = remainingTime % 60;

                                    // Update the content of the countdown element
                                    document.getElementById('countdown').textContent = ' ' + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

                                    // If there is remaining time, update again after 1 second
                                    if (remainingTime > 0) {
                                        setTimeout(updateCountdown, 1000);
                                    } else {
                                        // Reload the page when the countdown reaches 0:00
                                        location.reload();
                                    }
                                }

                                // Initial update of the countdown
                                updateCountdown();
                            </script>
                            ‎ pärast.
                        </p>
                    <?php else: ?>
                        <form action="whitelist-form.php" method="post">
                            <div class="p-4 mb-4">
                                <h1 class="px-8 py-8 text-2xl font-bold leading-7 text-tekst sm:text-3xl sm:tracking-tight">
                                    <?php echo "Küsimus $currentQuestion: " . $currentQuestionData["question"]; ?>
                                </h1>
                                <div class="ml-8 text-lg text-tekst">
                                    <?php foreach ($currentQuestionData["choices"] as $choice): ?>
                                        <input type="checkbox" name="answers[]" value="<?php echo $choice; ?>">
                                        <?php echo $choice; ?><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- "Next" Button -->
                            <input type="submit" value="Edasi" class="bg-blue-500 text-white text-lg p-2 px-4 ml-12 rounded">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php include("./modules/footer.php") ?>

</html>

<?php
function updateDbTime($discord_id, $db, $quiz_completion_time)
{
    // Calculate the new end time by adding 5 minutes to the existing whitelist_timer
    $newWhitelistTime = date('Y-m-d H:i:s', strtotime('+1 minutes'));

    // Prepare and execute the SQL update statement.
    $query = $db->prepare("UPDATE ucp_users SET whitelist_timer = :whitelist_time WHERE discord_id = :discord_id");
    $query->bindParam(':whitelist_time', $newWhitelistTime);
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();

    // Return the new whitelist timer time.
    return $newWhitelistTime;
}

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

function whitelistUser($discord_id, $db)
{
    // Prepare and execute the SQL update statement.
    $query = $db->prepare("INSERT INTO player_whitelists (identifier) 
              VALUES (:discord_id)");
    $query->bindParam(':discord_id', $discord_id);

    $query->execute();
}


?>
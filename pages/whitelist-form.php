<?php /*
include("config.php");
session_start();
$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if (!$isLoggedIn) {
header("Location: landing.php");
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
$current_page = "whitelist";


$timer_from_db = getWhitelistTimer($discord_id, $db);

*/
// Define an array for questions and answer choices
$questions = [
    1 => [
        "question" => "Milline nimi sobiks Shining San Andreas serveri mängijale?",
        "choices" => ["Joe Biden", "Carl King", "Lukas Meresaar", "Rasmus Kuusk"],
        "correct_answer" => "Carl King",
    ],
    2 => [
        "question" => "Saad twitchi streamist teada, et Mount Chiliadis toimub event, kus on palju looti. Milline on lubatud käitumisviis?",
        "choices" => ["Lähen teada saadud infoga eventi asukohta ning üritan osa varast endale saada. ", "Saadan mõne sõbra enda eest asukohta, et eventi kohta rohkem infot koguda ", "Annan OOC sõbrale teada, et ta mulle IC helistaks ja eventist teada annaks et saaksin kohale minna", "Ignoreerin streamist kuuldud infot ning jätkan rollimängu nagu tavaliselt."],
        "correct_answer" => "Ignoreerin streamist kuuldud infot ning jätkan rollimängu nagu tavaliselt.",
    ],

    3 => [
        "question" => "Milline järgnevatest näidetest kuulub VDM'i alla? ",
        "choices" => ["Sõidan kogemata ristmikul teisele autole otsa, tekitades autole suuri kahjustusi, vabandan pärast kannatanud isikule ja maksan vajalikud kulud ära.", "Sõidan niisama ringi ning otsustan laheda hüppe teha.", "Näen teeääres enda vihavaenlast, otsustan talle otsa sõita, et temast lihtsalt lahti saada.", "Tapan ilma mõjuva põhjuseta ära suvalise isiku."],
        "correct_answer" => "Näen teeääres enda vihavaenlast, otsustan talle otsa sõita, et temast lihtsalt lahti saada.",
    ],

    4 => [
        "question" => "Mis on Safezone?",
        "choices" => ["Safezone on koht, kus ei tohi kedagi röövida.", "Safezone on koht, kus võid teisi mängijaid vabalt röövida ja tappa. ", "Safezone on koht, kus võib lasta, kuid mitte kedagi tappa. ", "Safezone on koht, kus ei ole lubatud kedagi tappa, röövida ega konflikti alustada."],
        "correct_answer" => "Safezone on koht, kus ei ole lubatud kedagi tappa, röövida ega konflikti alustada.",
    ],

    5 => [
        "question" => "Leian serveris isiku kes kasutab ära suurt buggi. Milline on lubatud käitumisviis?",
        "choices" => ["Ei tee midagi sest see pole minu probleem.", "Teen discordis antud isiku kohta ticketi ning näitan vajalikke tõendeid, et isik saaks karistada.", "Teen isikuga kokkuleppe, et ei anna temast teada, kui õpetab mulle ka kuidas buggi kasutada. . ", "Annan isikule teada, et tema tegevus on serveri poolt karistatav aga ei tee midagi sest see pole minu probleem."],
        "correct_answer" => "Teen discordis antud isiku kohta ticketi ning näitan vajalikke tõendeid, et isik saaks karistada.",
    ],
    6 => [
        "question" => "Millistes olukordades on 'Revenge Kill' keelatud?",
        "choices" => ["Revenge kill on alati keelatud ", "Tegevus on lubatud ükskõik mis ajal.", "Revenge kill on keelatud olukorras kus su karakter mäletab olukorrast kõike ning tahab kättemaksu", "Revenge kill on keelatud kui sind on varasemalt tapetud ja sa ei mäleta olukorrast mitte midagi."],
        "correct_answer" => "Revenge kill on keelatud kui sind on varasemalt tapetud ja sa ei mäleta olukorrast mitte midagi.",
    ],
    7 => [
        "question" => "Näed Burgershoti parklas S klassi sõidukit mis on lukust lahti. Milline käitumisviis on lubatud?",
        "choices" => ["Lähen vaatan uudishimust auto pagasniku üle, et teada saada kas seal on midagi.", "Kuna tegu on safezonega siis lähen ja võtan auto pagasnikust kõik vara ära, sest see on lubatud.", "Ei pööra liigset tähelepänu autole ning jätkan rollimänguga.", "Saadan sõbra auto tühjaks varastama, et saaksin pärast vara endale."],
        "correct_answer" => "Ei pööra liigset tähelepänu autole ning jätkan rollimänguga.",
    ],
    8 => [
        "question" => "Plaanid RP'da, karakterit kellel on skisofreenia, et rikastada rollimängu serveris. Milline käitumisviis on lubatud?",
        "choices" => ["Võid teha karakteri ilma muredeta, sest serveris on haiguste RP'mine lubatud.", "Teed discordis ticketi ning kui saad administratiivtiimilt loa haigusega karakterit rp'da siis võid jätkata ilma probleemideta", "Haiguste RP'mine on keelatud, sest see tekitab ebamugavaid rollimängu olukordi serveris.", "Haiguseid võib serveris RP'da kuid peab pidama piire, et kõigil osapooltel oleks kvaliteetne rollimäng."],
        "correct_answer" => "Haiguseid võib serveris RP'da kuid peab pidama piire, et kõigil osapooltel oleks kvaliteetne rollimäng.",
    ],
    9 => [
        "question" => "Toimub politseiga tagaajamine ning sul tekib suur soov röövitud varaga minema saada. Millised on lubatud käitumisviisid?",
        "choices" => ["Sooritad linnas erinevaid hüppeid, et kaotada politsei sabast.", "Üritan Politseiautosi teelt maha rammida, et saaksin parema võimaluse põgeneda. ", "Lähen mägedesse ja sooritan meeletuid hüppeid lootes, et politsei ei suuda mul järel püsida.", "Lasen sõbral tulla maasturiga kõiki politseisi rammima, et nad rajalt maha saada."],
        "correct_answer" => "Sooritad linnas erinevaid hüppeid, et kaotada politsei sabast.",
    ],
    10 => [
        "question" => "Osaled kahe grupeeringu vahelisel tulevahetusel, ning saad keset olukorda surma. Milline tegevus on lubatud?",
        "choices" => ["Lased enda grupeeringu liikmetel ennast elustada ja naased olukorda.", "Kui võimalus tuleb siis sünnid haiglas ja naased koheselt olukorda tagasi.  ", "Lased enda grupeeringu liikmetel ennast elustada kuid lahkud olukorrast koheselt. ", "Hakkad enda grupeeringu liikmeid abistama, andes neile teiste asukohti samal ajal kui oled maas. "],
        "correct_answer" => "Lased enda grupeeringu liikmetel ennast elustada ja naased olukorda.",
    ],
    // Add more questions as needed
];

// Initialize the score

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the current question number
    $currentQuestion = isset($_SESSION["current_question"]) ? intval($_SESSION["current_question"]) : 0;

    // Check if the answer is submitted
    if (isset($_POST["answer"])) {
        $submittedAnswer = $_POST["answer"];
        $currentQuestion = $_SESSION["current_question"];
        $currentQuestionData = $questions[$currentQuestion];
        $correctAnswer = $currentQuestionData["correct_answer"];

        // Check if the answer is correct
        if ($submittedAnswer === $correctAnswer) {
            $_SESSION["score"]++; // Increment the score
        }

        // Check if this is the last question
        if ($currentQuestion == count($questions)) {
            // Mark the quiz as completed
            $_SESSION["quiz_completed"] = true;
        } else {
            // Increment the current question number
            $_SESSION["current_question"] = $currentQuestion + 1;
        }
    }
} else {
    // Initialize the current question and quiz completion flag
    $_SESSION["current_question"] = 1;
    $_SESSION["quiz_completed"] = false;
    $_SESSION["score"] = 0;
}
if ($_SESSION["quiz_completed"]) {
    $quiz_completion_time = time();
    $create_timer = updateDbTime($discord_id, $db, $quiz_completion_time);
    if ($_SESSION["score"] == 10) {
        $whitelist_user = whitelistUser($discord_id, $db);
        $_SESSION["whitelist_status"] = true;
    }
    ;
    header("Location: whitelist-completed.php");
    exit();
}



// Get the current question number and data
$currentQuestion = $_SESSION["current_question"];
$currentQuestionData = $questions[$currentQuestion];
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Whitelist - ShiningRP</title>
</head>
<?php include('./modules/navbar.php') ?>

<body class="bg-background">
    <div class="mb-6">
            <div class="flex items-center justify-center mt-16">
                <h5 hidden class="text-5xl text-tekst font-medium block">Whitelist</h5>
            </div>

        <div class="px-6 pt-6 2xl:container">
            <?php if ($_SESSION["whitelist_status"]): ?>
                <div
                    class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:text-3xl sm:tracking-tight">
                    <p>Sa oled juba whitelist testi läbinud! Edu serveris!</p>
                </div>

            <?php else: ?>
                <?php if ($_SESSION["quiz_completed"]): ?>
                    <div
                        class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:text-3xl sm:tracking-tight">
                        <?php if ($_SESSION["score"] >= 10): ?>
                            <p>Läbisid whitelisti edukalt! Edu serveris!</p>
                        <?php else: ?>
                            <p>Ebaõnnestusid whitelisti testi sooritamisel. Valesid vastuseid:
                                <?php echo (count($questions) - $_SESSION["score"]) ?> !
                            </p>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (($timer_from_db - time()) >= 0): ?>
                        <p
                            class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:text-3xl sm:tracking-tight text-center">
                            Pead veel ootama
                            <?php echo gmdate("i:s", ($timer_from_db - time())) ?> minutit et uuesti proovida.
                        <?php else: ?>
                        <form action="whitelist-form.php" method="post">
                            <div class="p-4 mb-4">
                                <h1 class="px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:text-3xl sm:tracking-tight">
                                    <?php echo "Küsimus $currentQuestion: " . $currentQuestionData["question"]; ?>
                                </h1>
                                <div class="ml-8 text-lg text-zinc-300">
                                    <?php foreach ($currentQuestionData["choices"] as $choice): ?>
                                        <input type="radio" name="answer" value="<?php echo $choice; ?>">
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
    $newWhitelistTime = date('Y-m-d H:i:s', strtotime('+5 minutes'));

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
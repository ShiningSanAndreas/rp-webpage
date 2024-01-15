<?php
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
  };
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
<body class="bg-background">
<aside
        class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r border-gray-950 bg-gray transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
        <div>
            <div class="-mx-6 px-6 py-4 flex justify-center items-center">
                <a href="#" title="home">

                </a>
            </div>

            <div class="mt-8 text-center">
                <img src="<?php echo $avatar_url ?>" alt=""
                    class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
                <h5 class="hidden mt-4 text-xl font-semibold text-zinc-300 lg:block">
                    <?php echo $global_name ?>
                </h5>
                <!-- <span class="hidden text-gray-400 lg:block">Admin</span> -->
            </div>

            <ul class="space-y-2 tracking-wide mt-8">
                <li>
                    <a href="dashboard.php" aria-label="avaleht"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-zinc-300 <?php echo $current_page === "dashboard" ? 'bg-gradient-to-r from-sky-600 to-cyan-400' : ''; ?>">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Avaleht</span>
                    </a>
                </li>
                <li>
                <a href="rules.php" aria-label="reeglid" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-zinc-300 <?php echo $current_page === "rules" ? 'bg-gradient-to-r from-sky-600 to-cyan-400' : ''; ?>">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Reeglid</span>
                    </a>
                </li>
                <li>
                    <a href="whitelist-form.php" aria-label="whitelist"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-zinc-300 bg-gradient-to-r from-sky-600 to-cyan-400">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Whitelist</span>
                    </a>
                </li>
                <li>
                    <a href="tester-form.php" aria-label="whitelist"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-zinc-300 <?php echo $current_page === "tester_form" ? 'bg-gradient-to-r from-sky-600 to-cyan-400' : ''; ?>">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Beta Testing</span>
                    </a>
                </li>
                <!-- <li>
    <a href="donation.php" aria-label="Pood"
        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-zinc-300 <?php echo $current_page === "donation" ? 'bg-gradient-to-r from-sky-600 to-cyan-400' : ''; ?>">
        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
            <path
                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                class="fill-current group-hover:text-sky-300"></path>
        </svg>
        <span class="-mr-1 font-medium">Pood</span>
    </a>
</li> -->
            </ul>
        </div>

        <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t border-gray-950">
            <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-zinc-300 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <!-- <span class="group-hover:text-gray-700">Logout</span> -->
                <a href="logout.php" class="group-hover:text-gray-700">Logi välja</a>
            </button>
        </div>
    </aside>

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


                    
                    
                <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#bfbfbf}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>                    <p class=" text-zinc-300"><?php echo $_SESSION["userBalance"]; ?> coins</p>
                </div>
            </div>
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
                                <div>
                                </div>
                            </div>

                            <!-- "Next" Button -->
                            <input type="submit" value="Edasi" class="bg-blue-500 text-white text-lg p-2 px-4 ml-12 rounded">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
</body>
</html>

<?php
function updateDbTime($discord_id, $db, $quiz_completion_time) {
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

function getWhitelistTimer($discord_id, $db) {
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

function whitelistUser($discord_id, $db) {
    // Prepare and execute the SQL update statement.
    $query = $db->prepare("INSERT INTO player_whitelists (identifier) 
              VALUES (:discord_id)");
    $query->bindParam(':discord_id', $discord_id);

    $query->execute();
    }


?>
<?php
include("../config.php");
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
$current_page = "tester_form";



// ... (your existing code)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted

    // Retrieve form data
    $whyme = $_POST["whyme"];
    $discord_id = $_POST["discord_id"];
    $avatar_url = $_POST["avatar_url"];

    try {
        // Insert the form data into the database
        $query = $db->prepare("INSERT INTO ucp_forms (senderDiscord, avatar, application, type) 
                              VALUES (:senderDiscord, :avatar, :application, 'Beta-Tester')");
        $query->bindParam(':senderDiscord', $global_name);
        $query->bindParam(':avatar', $avatar_url);
        $query->bindParam(':application', $whyme);

        $query->execute();

        // Redirect to a different page to prevent form resubmission
        header("Location: tester-form.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle the error appropriately
    }
}

// ... (your existing code)


function checkExisting($db, $global_name) {
    $query = $db->prepare("SELECT * FROM ucp_forms WHERE senderDiscord = :discordId and type = 'Beta-Tester'");
    $query->bindParam(':discordId', $global_name);
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

$existingSubmission = checkExisting($db, $global_name);




// Get the current question number and data
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
<title>Testija vorm - ShiningRP </title>
</head>
<body class="bg-gray-800	">
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
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-zinc-300">
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
                <h5 hidden class="text-2xl text-zinc-300 font-medium lg:block">Beta Testing</h5>
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

        <div class="px-0 pt-6 2xl:container">
            <?php if ($_SESSION["whitelist_status"]): ?>
                <?php if (!$existingSubmission): ?>

               
                        <form action="tester-form.php" method="post" class="max-w-2xl mx-auto">
    <div class="p-0 mb-8 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white mb-4">
        Beta-testeri Sooviavaldus
        </h1>
        <p class="text-gray-300 mb-6">
        Shining San Andreas areneb dünaamiliselt ning meie edulugu sõltub meie kogukonna toetusest.
         Selleks, et tagada, et kõik süsteemid toimiksid tõrgeteta, otsime kirevaid ja pühendunud inimesi, kes oleksid valmis panustama meie
          mänguserveri arendusprotsessi. Beta-testijana pakume sulle erilist võimalust sukelduda uute süsteemide maailma enne nende avalikkuse
           ette jõudmist. Mängijate tagasiside ja mänguelamused on meile tähtsad, aidates meil süsteeme täiustada ja optimeerida.
            Ole osa meie kogukonnast, täida avaldus ja aita meil koos luua unikaalne mängukeskkond. Kõik täidetud avaldused vaadatakse läbi vastavalt
             meie arendustöö vajadustele, pakkudes sulle võimaluse olla osa Shining San Andrease põnevast arengust.
        </p>
        <div class="mb-6">
            <label for="whyme" class="text-gray-300 text-lg block mb-2">
                Miks peaksid sobima sina meie Beta-testeriks?
            </label>
            <textarea id="whyme" name="whyme" rows="4" class="w-full px-4 py-2 border border-gray-500 rounded-md text-gray-800 focus:outline-none focus:border-blue-500"></textarea>
        </div>
        <input type="hidden" name="discord_id" value="<?php echo $discord_id; ?>">
<input type="hidden" name="avatar_url" value="<?php echo $avatar_url; ?>">
        <input type="submit" value="Kandideeri" class="bg-blue-500 text-white text-lg p-2 px-4 rounded cursor-pointer hover:bg-blue-600">
    </div>
</form>

<?php else: ?>
    <div
    class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:text-3xl sm:tracking-tight">
                    <p>Teie avaldus on hetkel Vaatamisel. Varu kannatust ja tänud, et soovid panustada Shining San Andrease arengusse!</p>
                </div>
                <?php endif; ?>
            <?php else: ?>
                <div
                    class="flex justify-center px-8 py-8 text-2xl font-bold leading-7 text-zinc-300 sm:text-3xl sm:tracking-tight">
                    <p>Esmalt pead Whitelisti läbima!</p>
                </div>
                <?php endif; ?>
        </div>
</body>
</html>

<?php


?>
<?php 
require __DIR__ . "/../config.php"; 
session_start();
$current_page = "whitelist"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Whitelist - ShiningRP</title>
</head>

<?php
require __DIR__ . "/./modules/navbar.php";
?>
<body class="bg-background">
    <div class="mb-6 max-w-screen-xl mx-auto">
        <div class="text-white mt-16 mb-6 pl-4 ">
            <h2 class="text-2xl font-nihilist italic">Whitelist Vorm</h2>
        </div>
    </div>

<!-- Form to switch between quiz and lobby views -->


    <?php
    // Check the submitted form data to determine the view
    $currentView = isset($_POST['view']) ? $_POST['view'] : '';


    if ($currentView == 'quiz') {
        // Quiz view
        require __DIR__ . "/./modules/quiz.php";  // Assuming you have a separate PHP file for the quiz view
    } elseif ($currentView == 'lobby') {
        // Lobby view
        require __DIR__ . "/./modules/lobby.php";  // Assuming you have a separate PHP file for the lobby view
    } else {
        if (isset($_POST['step'])) {
            require __DIR__ . "/./modules/quiz.php";
        } else {
            require __DIR__ . "/./modules/lobby.php";
        }
    }
    
    ?>
</body>
<?php require __DIR__ . "/./modules/footer.php" ?>
</html>
<!-- tester-form.php -->
<?php include("../config.php"); 

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Support - ShiningRP</title>
</head>

<?php
include("./modules/navbar.php");
?>
<body class="bg-background">
    <div class="ml-auto mb-6 lg:w-[70%] xl:w-[75%] 2xl:w-[85%] mx-auto">
        <div class="text-white mt-16 mb-6">
            <h2 class="text-3xl font-semibold">Tester Form</h2>
        </div>
    </div>

<!-- Form to switch between quiz and lobby views -->


    <?php
    // Check the submitted form data to determine the view
    $currentView = isset($_POST['view']) ? $_POST['view'] : '';


    if ($currentView == 'quiz') {
        // Quiz view
        include("./modules/quiz.php");  // Assuming you have a separate PHP file for the quiz view
    } elseif ($currentView == 'lobby') {
        // Lobby view
        include("./modules/lobby.php");  // Assuming you have a separate PHP file for the lobby view
    } else {
        if (isset($_POST['step'])) {
            include("./modules/quiz.php");
        } else {
            include("./modules/lobby.php");
        }
    }
    
    ?>


    <?php include("./modules/footer.php") ?>
</body>

</html>
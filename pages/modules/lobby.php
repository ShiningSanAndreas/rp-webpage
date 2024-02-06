<!-- lobby.php -->
<?php
session_start(); // Start the session

if (isset($_GET['selectedOptions'])) {
    $selectedOptions = json_decode($_GET['selectedOptions'], true);

    // Display the selected options (modify this part based on your specific implementation)
    echo '<h3>Selected Options:</h3>';
    echo '<pre>';
    print_r($selectedOptions);
    echo '</pre>';
} elseif (isset($_SESSION['selectedOptions'])) {
    // Display the selected options from the session variable
    echo '<h3>Selected Options:</h3>';
    echo '<pre>';
    print_r($_SESSION['selectedOptions']);
    echo '</pre>';
}
?>

<form method="post">
    <button type="submit" name="view" value="quiz">Go to Quiz</button>
</form>

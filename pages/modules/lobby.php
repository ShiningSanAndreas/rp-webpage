<!-- lobby.php -->
<?php
    // Start session if not already started
    session_start();
    
    // Retrieve the selectedOptions array from session variable
    $selectedOptions = isset($_SESSION['selectedOptions']) ? $_SESSION['selectedOptions'] : [];
?>


<?php
    foreach ($selectedOptions as $questionNumber => $options) {
        echo "<p>Question $questionNumber:</p>";
        echo "<ul>";
        foreach ($options as $optionId => $isChecked) {
            echo "<li>Option $optionId: " . ($isChecked ? "Selected" : "Not Selected") . "</li>";
        }
        echo "</ul>";
    }
?>



<form method="post">
    <button type="submit" name="view" value="quiz">Go to Quiz</button>
</form>

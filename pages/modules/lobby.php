<!-- lobby.php -->
<?php
session_start();

// Check if the session variables are set
if (isset($_SESSION['correctAnswers']) && isset($_SESSION['incorrectQuestions'])) {
    $correctAnswers = $_SESSION['correctAnswers'];
    $incorrectQuestions = $_SESSION['incorrectQuestions'];
    
    // Display the data, you can customize this part as needed
    echo "Correct Answers: $correctAnswers<br>";
    
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


<form method="post">
    <button type="submit" name="view" value="quiz">Go to Quiz</button>
</form>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['correctAnswers']) && isset($_POST['incorrectQuestions'])) {
        $_SESSION['correctAnswers'] = $_POST['correctAnswers'];
        $_SESSION['incorrectQuestions'] = json_decode($_POST['incorrectQuestions'], true);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>

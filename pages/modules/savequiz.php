<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectedOptions'])) {
        $_SESSION['selectedOptions'] = json_decode($_POST['selectedOptions'], true);
        echo json_encode(['status' => 'success']);
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
?>

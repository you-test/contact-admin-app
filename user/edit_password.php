<?php

require_once __DIR__ . '/../Controllers/AuthController.php';

session_start();
AuthController::loginJudge();

$userId = $_GET['user_id'];

// validation
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$content = 'user/tmp_edit_password.php';
include __dir__ . '/../views/layout.php';

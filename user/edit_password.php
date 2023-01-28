<?php

require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/TokenController.php';

session_start();
AuthController::loginJudge();
TokenController::createToken();

$userId = $_GET['user_id'];

// validation
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$content = 'user/tmp_edit_password.php';
include __dir__ . '/../views/layout.php';

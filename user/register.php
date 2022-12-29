<?php

require_once __DIR__ . '/../Controllers/AuthController.php';

session_start();
AuthController::loginJudge();

// validation
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$content = 'user/tmp_register.php';
include __dir__ . '/../views/layout.php';

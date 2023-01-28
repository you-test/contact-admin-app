<?php

require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/TokenController.php';

session_start();
AuthController::loginJudge();
TokenController::createToken();

// validation
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$content = 'user/tmp_register.php';
include __dir__ . '/../views/layout.php';

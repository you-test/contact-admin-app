<?php

require_once __DIR__ . '/../Controllers/AuthController.php';

session_start();
AuthController::loginJudge();

$content = 'contact/tmp_register.php';
include __dir__ . '/../views/layout.php';

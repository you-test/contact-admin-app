<?php

require_once __DIR__ . '/../Controllers/AuthController';

session_start();
AuthController::loginJudge();

$content = 'user/tmp_register.php';
include __dir__ . '/../views/layout.php';

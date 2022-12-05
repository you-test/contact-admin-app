<?php

require_once __DIR__ . '/../Controllers/AuthController';

session_start();
AuthController::loginJudge();

$userId = $_GET['user_id'];

$content = 'user/tmp_edit_password.php';
include __dir__ . '/../views/layout.php';

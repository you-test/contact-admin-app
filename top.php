<?php

require_once __DIR__ . '/Controllers/AuthController.php';

session_start();
AuthController::loginJudge();

$content = 'tmp_top.php';
include __dir__ . '/views/layout.php';

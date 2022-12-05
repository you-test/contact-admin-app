<?php

require_once __DIR__ . '/Controllers/AuthController';

session_start();
AuthController::loginJudge();

$content = 'tmp_top.php';
include __dir__ . '/views/layout.php';

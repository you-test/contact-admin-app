<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/UserDataController.php';
require_once __DIR__ . '/../../Controllers/TokenController.php';

session_start();
TokenController::validateToken();

$pdo = Database::dbConnect();
$userData = new UserDataController($pdo);
$userData->delete();

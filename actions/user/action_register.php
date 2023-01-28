<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/UserDataController.php';
require_once __DIR__ . '/../../Controllers/Validation.php';
require_once __DIR__ . '/../../Controllers/TokenController.php';

session_start();
TokenController::validateToken();

$pdo = Database::dbConnect();
$contactData = new UserDataController($pdo);
$contactData->register();

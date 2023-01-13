<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/UserDataController.php';
require_once __DIR__ . '/../../Controllers/Validation.php';

session_start();
$pdo = Database::dbConnect();
$userDataInstance = new UserDataController($pdo);
$userDataInstance->updatePassword();

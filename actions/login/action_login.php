<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/LoginController.php';

session_start();
$pdo = Database::dbConnect();
$loginInstance = new LoginController($pdo);
$loginInstance->login();

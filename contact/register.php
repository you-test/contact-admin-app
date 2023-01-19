<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/UserListController.php';
require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/TokenController.php';

session_start();
AuthController::loginJudge();
TokenController::createToken();

$pdo = Database::dbConnect();

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}
$usersListInstance = new UserListController($pdo);
$usersData = $usersListInstance->getUsersData();

$content = 'contact/tmp_register.php';
include __dir__ . '/../views/layout.php';

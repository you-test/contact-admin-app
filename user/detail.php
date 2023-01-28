<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/UserDataController.php';
require_once __DIR__ . '/../Controllers/UserTaskController.php';
require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/TokenController.php';

session_start();
AuthController::loginJudge();
TokenController::createToken();

$pdo = Database::dbConnect();
$userDataInstance = new UserDataController($pdo);
$userId = $_GET['user_id'];
$userData = $userDataInstance->getUserData($userId);
$tasks = UserTaskController::getTasksNumByProgress($userData['user_id'], $pdo);

// validation
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$content = 'user/tmp_detail.php';
include __dir__ . '/../views/layout.php';

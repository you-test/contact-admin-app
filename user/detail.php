<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/UserDataController.php';
require_once __DIR__ . '/../Controllers/UserTaskController.php';
require_once __DIR__ . '/../Controllers/AuthController';

session_start();
AuthController::loginJudge();

$pdo = Database::dbConnect();
$userDataInstance = new UserDataController($pdo);
$userId = $_GET['user_id'];
$userData = $userDataInstance->getUserData($userId);
$tasks = UserTaskController::getTasksNumByProgress($userData['user_id'], $pdo);


$content = 'user/tmp_detail.php';
include __dir__ . '/../views/layout.php';

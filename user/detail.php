<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/UserDataController.php';
require_once __DIR__ . '/../Controllers/UserTaskController.php';

$pdo = Database::dbConnect();
$userDataInstance = new UserDataController($pdo);
$userData = $userDataInstance->getUserData();
$tasks = UserTaskController::getTasksNumByProgress($userData['user_id'], $pdo);


$content = 'user/tmp_detail.php';
include __dir__ . '/../views/layout.php';

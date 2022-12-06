<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/UserTaskController.php';
require_once __DIR__ . '/../Controllers/UserListController.php';
require_once __DIR__ . '/../Controllers/PermissionController.php';
require_once __DIR__ . '/../Controllers/AuthController.php';

session_start();
AuthController::loginJudge();

$pdo = Database::dbConnect();
$userList = new UserListController($pdo);
$usersDataAndTasks = $userList->showUserList();

$content = 'user/tmp_index.php';
include __dir__ . '/../views/layout.php';

<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/UserListController.php';

$pdo = Database::dbConnect();
$userList = new UserListController($pdo);
$usersDataAndTasks = $userList->showUserList();

$content = 'user/tmp_index.php';
include __dir__ . '/../views/layout.php';

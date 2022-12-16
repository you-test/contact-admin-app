<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactDataController.php';
require_once __DIR__ . '/../Controllers/ContactLogController.php';
require_once __DIR__ . '/../Controllers/UserListController.php';
require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/PermissionController.php';

session_start();
AuthController::loginJudge();

$pdo = Database::dbConnect();
$contactDataInstance = new ContactDataController($pdo);
$contactLogInstance = new ContactLogController($pdo);
$contactData = $contactDataInstance->getContactData();
$contactLogs = $contactLogInstance->getContactLogs();
$usersListInstance = new UserListController($pdo);
$usersData = $usersListInstance->getUsersData();

$permissionId = PermissionController::PERMISSION_ID['reader'];
if (isset($_SESSION['user']['permission_id'])) {
    $permissionId = $_SESSION['user']['permission_id'];
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$content = 'contact/tmp_detail.php';
include __dir__ . '/../views/layout.php';

<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactListController.php';
require_once __DIR__ . '/../Controllers/UserDataController.php';
require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/PermissionController.php';
require_once __DIR__ . '/../Controllers/ContactStatusController.php';

session_start();
AuthController::loginJudge();

$pdo = Database::dbConnect();
$contactList = new ContactListController($pdo);
$contactListData = $contactList->showContactList();
$userDataInstance = new UserDataController($pdo);

$content = 'contact/tmp_index.php';
include __dir__ . '/../views/layout.php';

<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactDataController.php';
require_once __DIR__ . '/../Controllers/ContactLogController.php';
require_once __DIR__ . '/../Controllers/UserListController.php';

$pdo = Database::dbConnect();
$contactDataInstance = new ContactDataController($pdo);
$contactLogInstance = new ContactLogController($pdo);
$contactData = $contactDataInstance->getContactData();
$contactLogs = $contactLogInstance->getContactLogs();
$usersListInstance = new UserListController($pdo);
$usersData = $usersListInstance->getUsersData();
print_r($usersData);

$content = 'contact/tmp_detail.php';
include __dir__ . '/../views/layout.php';

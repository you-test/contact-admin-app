<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactListController.php';
require_once __DIR__ . '/../Controllers/UserDataController.php';

$pdo = Database::dbConnect();
$contactList = new ContactListController($pdo);
$contactListData = $contactList->showContactList();
$userDataInstance = new UserDataController($pdo);

$content = 'contact/tmp_index.php';
include __dir__ . '/../views/layout.php';

<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactDataController.php';
require_once __DIR__ . '/../Controllers/ContactLogController.php';

$pdo = Database::dbConnect();
$contactDataInstance = new ContactDataController($pdo);
$contactLogInstance = new ContactLogController($pdo);
$contactData = $contactDataInstance->getContactData();
$contactLogs = $contactLogInstance->getContactLogs();
print_r($contactData);

$content = 'contact/tmp_detail.php';
include __dir__ . '/../views/layout.php';

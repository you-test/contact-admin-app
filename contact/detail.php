<?php

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactDataController.php';

$pdo = Database::dbConnect();
$contactDataInstance = new ContactDataController($pdo);
$contactData = $contactDataInstance->getContactData();
print_r($contactData);

$content = 'contact/tmp_detail.php';
include __dir__ . '/../views/layout.php';

<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactDataController.php';
require_once __DIR__ . '/../../Controllers/ContactLogController.php';

$pdo = Database::dbConnect();
$contactData = new ContactDataController($pdo);
$contactLog = new ContactLogController($pdo);
$contactData->update();
$contactLog->register();

<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactDataController.php';

$pdo = Database::dbConnect();
$contactData = new ContactDataController($pdo);
$contactData->update();

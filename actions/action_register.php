<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Controllers/ContactData.php';

$pdo = Database::dbConnect();
$contactData = new ContactData($pdo);
$contactData->register();

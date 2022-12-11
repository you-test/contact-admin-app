<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactDataController.php';
require_once __DIR__ . '/../../Controllers/Validation.php';

session_start();
$pdo = Database::dbConnect();
$contactData = new ContactDataController($pdo);
$contactData->register();

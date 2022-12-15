<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactLogController.php';

$pdo = Database::dbConnect();
$contactLog = new ContactLogController($pdo);
$contactLog->deleteTargetLog();

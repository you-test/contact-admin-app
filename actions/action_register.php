<?php

require_once __dir__ . '/../config/config.php';
require_once __dir__ . '/../Database/Database.php';

$pdo = Database::dbConnect();
$contactData = new ContactData($pdo);
$contactData->register();

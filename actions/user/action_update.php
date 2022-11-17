<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/UserDataController.php';

$pdo = Database::dbConnect();
$userData = new UserDataController($pdo);

$userData->update();

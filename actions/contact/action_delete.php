<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactDataController.php';
require_once __DIR__ . '/../../Controllers/ContactLogController.php';
require_once __DIR__ . '/../../Controllers/TokenController.php';

session_start();

TokenController::validateToken();

$pdo = Database::dbConnect();
$contactData = new ContactDataController($pdo);
$contactLog = new ContactLogController($pdo);

// お問い合わせデータの削除
$contactData->delete();
// 履歴の削除
$contactLog->delete();

header('Location: ../../contact');

<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactDataController.php';
require_once __DIR__ . '/../../Controllers/ContactLogController.php';
require_once __DIR__ . '/../../Controllers/Validation.php';

session_start();
$pdo = Database::dbConnect();
$contactData = new ContactDataController($pdo);
$contactLog = new ContactLogController($pdo);
$contactData->update();
// ログの新規登録がある場合
$contactLog->register();
// 既存ログの更新
$contactLog->update();

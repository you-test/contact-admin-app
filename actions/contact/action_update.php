<?php

require_once __DIR__ . '/../../Database/Database.php';
require_once __DIR__ . '/../../Controllers/ContactDataController.php';
require_once __DIR__ . '/../../Controllers/ContactLogController.php';
require_once __DIR__ . '/../../Controllers/Validation.php';
require_once __DIR__ . '/../../Controllers/TokenController.php';


session_start();
TokenController::validateToken();

$pdo = Database::dbConnect();
$contactData = new ContactDataController($pdo);
$contactLog = new ContactLogController($pdo);

unset($_SESSION['error']);
$contactData->update();
// ログの新規登録がある場合
$contactLog->register();
// 既存ログの更新
$contactLog->update();
// バリデーションの判定
$contactId = $_POST['id'];
Validation::contactUpdateValidation($contactId);

<?php

session_start();

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

include __DIR__ . '/views/login/tmp_login.php';

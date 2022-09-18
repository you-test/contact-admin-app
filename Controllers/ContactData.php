<?php

class ContactData
{
    public function __construct(private Database $pdo)
    {
    }

    // お問い合わせデータの登録
    public function register(): void
    {
        if ($_SERVER['REQUEST_METNOD'] === 'POST') {
            $receiveTime = $_POST['receive_time'];
            $status = $_POST['status'];
            $user = $_POST['user'];
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $log = $_POST['log'];
        }
    }
}

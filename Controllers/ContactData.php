<?php

class ContactData
{
    public function __construct(private PDO $pdo)
    {
    }

    // お問い合わせデータの登録
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $receiveTime = $_POST['receive_time'];
            $status = $_POST['status'];
            $user = $_POST['user'];
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $title = $_POST['title'];
            $content = $_POST['content'];

            // contact_dataテーブルへのデータ挿入
            $ContactDataSql = <<<SQL
            INSERT INTO contact_data
            (received_date, status, user_id, mail, title, content)
            VALUES
            (:received_date, :status, :user_id, :mail, :title, :content)
            SQL;
            $statement = $this->pdo->prepare($ContactDataSql);
            $statement->bindValue('received_date', $receiveTime);
            $statement->bindValue('status', $status);
            $statement->bindValue('user_id', $user);
            $statement->bindValue('mail', $mail);
            $statement->bindValue('title', $title);
            $statement->bindValue('content', $content);
            $statement->execute();
            header('Location: ../contact');
        }
    }
}

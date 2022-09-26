<?php

class ContactDataController
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
            $contactDataSql = <<<SQL
            INSERT INTO contact_data
            (received_date, status, user_id, mail, title, content)
            VALUES
            (:received_date, :status, :user_id, :mail, :title, :content)
            SQL;
            $statement = $this->pdo->prepare($contactDataSql);
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

    // お問い合わせデータの取得
    public function getContactData(): array
    {
        $contact_id = $_GET['id'];
        $sql = <<<SQL
        SELECT * FROM contact_data
        WHERE contact_id = :contact_id;
        SQL;
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('contact_id', $contact_id);
        $statement->execute();
        $contactData = $statement->fetch();
        return $contactData;
    }
}

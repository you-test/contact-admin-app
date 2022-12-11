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

            $validation = new Validation();
            $validation->contactRegisterValidation($receiveTime, $status, $user, $name, $mail, $title, $content);

            // contact_dataテーブルへのデータ挿入
            $contactDataSql = <<<SQL
            INSERT INTO contact_data
            (received_date, status, user_id, name, mail, title, content)
            VALUES
            (:received_date, :status, :user_id, :name, :mail, :title, :content)
            SQL;
            $statement = $this->pdo->prepare($contactDataSql);
            $statement->bindValue('received_date', $receiveTime);
            $statement->bindValue('status', $status);
            $statement->bindValue('user_id', $user);
            $statement->bindValue('name', $name);
            $statement->bindValue('mail', $mail);
            $statement->bindValue('title', $title);
            $statement->bindValue('content', $content);
            $statement->execute();
            unset($_SESSION['error']);
            header('Location: ../../contact');
        }
    }

    // お問い合わせデータの更新
    public function update(): void
    {
        $contactId = $_POST['id'];
        $receivedTime = $_POST['receive_time'];
        $status = $_POST['status'];
        $user = $_POST['user'];
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        // contact_dataテーブルへのデータ更新
        $sql = <<<SQL
        UPDATE
            contact_data
        SET
            received_date = :received_time,
            status = :status,
            user_id = :user_id,
            name = :name,
            mail = :mail,
            title = :title,
            content = :content
        WHERE
            contact_id = :contact_id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('received_time', $receivedTime);
        $statement->bindValue('status', $status);
        $statement->bindValue('user_id', $user);
        $statement->bindValue('name', $name);
        $statement->bindValue('mail', $mail);
        $statement->bindValue('title', $title);
        $statement->bindValue('content', $content);
        $statement->bindValue('contact_id', $contactId);
        $statement->execute();
    }

    // お問い合わせデータの取得
    public function getContactData(): array
    {
        $contactId = $_GET['id'];
        $sql = <<<SQL
        SELECT * FROM contact_data
        WHERE contact_id = :contact_id;
        SQL;
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('contact_id', $contactId);
        $statement->execute();
        $contactData = $statement->fetch();
        return $contactData;
    }

    // お問い合わせデータの削除
    public function delete(): void
    {
        $contactId = $_GET['contact_id'];
        $sql = <<<SQL
        DELETE FROM contact_data
        WHERE contact_id = :contact_id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('contact_id', $contactId);
        $statement->execute();
    }
}

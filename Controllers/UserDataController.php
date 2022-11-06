<?php

class UserDataController
{
    public function __construct(private PDO $pdo)
    {
    }

    // お問い合わせデータの登録
    public function register(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $permission = $_POST['permission'];

            // contact_dataテーブルへのデータ挿入
            $userDataSql = <<<SQL
            INSERT INTO users
            (name, mail, permission_id)
            VALUES
            (:name, :mail, :permission_id)
            SQL;

            $statement = $this->pdo->prepare($userDataSql);
            $statement->bindValue('name', $name);
            $statement->bindValue('mail', $mail);
            $statement->bindValue('permission_id', $permission);
            $statement->execute();
            header('Location: ../../user');
        }
    }

    // お問い合わせデータの更新
    public function update(): void
    {
    }

    // お問い合わせデータの取得
    public function getContactData(): array
    {
    }

    // お問い合わせデータの削除
    public function delete(): void
    {
    }
}

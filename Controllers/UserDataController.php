<?php

class UserDataController
{
    public function __construct(private PDO $pdo)
    {
    }

    // ユーザーデータの登録
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

    // ユーザーデータの更新
    public function update(): void
    {
    }

    // ユーザーデータの取得
    public function getUserData(): array
    {
        $user_id = $_GET['user_id'];

        $userDataSql = <<<SQL
        SELECT
            user_id,
            mail,
            name,
            permission_id
        FROM
            users
        WHERE
            user_id = $user_id
        SQL;

        $statement = $this->pdo->query($userDataSql);
        $statement->execute();
        $userData = $statement->fetch();

        return $userData;
    }

    // ユーザーデータの削除
    public function delete(): void
    {
    }
}

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
            $password = $_POST['password'];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // validation
            $validation = new Validation();
            $validation->userRegisterValidation($name, $mail, $password);

            // contact_dataテーブルへのデータ挿入
            $userDataSql = <<<SQL
            INSERT INTO users
            (name, mail, permission_id, pass)
            VALUES
            (:name, :mail, :permission_id, :pass)
            SQL;

            $statement = $this->pdo->prepare($userDataSql);
            $statement->bindValue('name', $name);
            $statement->bindValue('mail', $mail);
            $statement->bindValue('permission_id', $permission);
            $statement->bindValue('pass', $passwordHash);
            $statement->execute();
            header('Location: ../../user');
        }
    }

    // ユーザーデータの更新
    public function update(): void
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $permission = $_POST['permission'];

        // validation
        $validation = new Validation();
        $validation->userUpdateValidation($name, $mail, $user_id);

        $sql = <<<SQL
        UPDATE
            users
        SET
            name = :name,
            mail = :mail,
            permission_id = :permission
        WHERE
            user_id = :user_id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('name', $name);
        $statement->bindValue('mail', $mail);
        $statement->bindValue('user_id', $user_id);
        $statement->bindValue('permission', $permission);
        $statement->execute();

        header('Location: ../../user');
    }

    // ユーザーデータの取得
    public function getUserData(int $userId): array
    {
        $userDataSql = <<<SQL
        SELECT
            user_id,
            mail,
            name,
            permission_id
        FROM
            users
        WHERE
            user_id = $userId
        SQL;

        $statement = $this->pdo->query($userDataSql);
        $statement->execute();
        $userData = $statement->fetch();

        if ($userData) {
            return $userData;
        }

        return ['name' => '担当ユーザーが登録されていません'];
    }

    // ユーザーデータの削除
    public function delete(): void
    {
        $user_id = $_GET['user_id'];

        $sql =<<<SQL
        DELETE
            FROM users
        WHERE
            user_id = :user_id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('user_id', $user_id);
        $statement->execute();

        header('Location: ../../user');
    }

    // パスワードの更新
    public function updatePassword(): void
    {
        $userId = $_POST['user_id'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $validation = new Validation();
        $validation->passwordUpdateValidation($password, $userId);

        $sql = <<<SQL
        UPDATE
            users
        SET
            pass = :pass
        WHERE
            user_id = :user_id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('pass', $passwordHash);
        $statement->bindValue('user_id', $userId);
        $statement->execute();

        header('Location: ../../user/detail.php?user_id='. $userId);
    }
}

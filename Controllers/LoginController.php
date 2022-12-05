<?php

class LoginController
{
    public function __construct(private PDO $pdo)
    {
    }

    public function login(): void
    {
        $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
        $pass = isset($_POST['pass']) ? $_POST['pass'] : null;

        $sql = 'SELECT * FROM users WHERE mail = :mail';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('mail', $mail);
        $statement->execute();
        $result = $statement->fetch();

        if ($result) {
            if (password_verify($pass, $result['pass'])) {
            $_SESSION['user']['name'] = $result['name'];
            $_SESSION['user']['permission_id'] = $result['permission_id'];
            header('Location: ../../top.php');
            } else {
                $message = 'メールアドレスまたはパスワードが違います';
                header('Location: ../../login.php');
            }
        } else {
            $message = 'メールアドレスまたはパスワードが違います';
            header('Location: ../../login.php');
        }
    }
}

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

        // validation
        $validation = new Validation();
        $validation->loginValidation($mail, $pass);

        $sql = 'SELECT * FROM users WHERE mail = :mail';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('mail', $mail);
        $statement->execute();
        $result = $statement->fetch();

        $_SESSION['error'] = [];
        if ($result) {
            if (password_verify($pass, $result['pass'])) {
            $_SESSION['user']['name'] = $result['name'];
            $_SESSION['user']['permission_id'] = $result['permission_id'];
            header('Location: ../../top.php');
            } else {
                $_SESSION['error'][] = 'メールアドレスまたはパスワードが違います';
                header('Location: ../../login.php');
            }
        } else {
            $_SESSION['error'][] = 'メールアドレスまたはパスワードが違います';
            header('Location: ../../login.php');
        }
    }
}

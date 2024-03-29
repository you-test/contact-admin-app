<?php

class Validation
{
    private $error = [];

    // contact register validation
    public function contactRegisterValidation(string $receiveTime, string $status, int $user, string $name, string $mail, string $title, string $content) :void
    {
        $_SESSION['error'] = [];

        // recieved data (date > now, empty)
        if (empty(trim($receiveTime))) {
            $this->error[] = '受信日を選択してください。';
        }
        // name (empty)
        if (empty(trim($name))) {
            $this->error[] = '名前を入力してください。';
        }
        // mail (empty, not mail type)
        if (empty(trim($mail))) {
            $this->error[] = 'メールアドレスを入力してください。';
        }

        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($mail))) {
            $this->error[] = 'メールアドレスの形式が間違っています。';
        }
        // title (empty)
        if (empty(trim($title))) {
            $this->error[] = 'タイトルを入力してください。';
        }
        // content (empty)
        if (empty(trim($content))) {
            $this->error[] = '本文を入力してください。';
        }

        $_SESSION['error'] = $this->error;

        if ($_SESSION['error'] === []) {
            return;
        }

        header('Location: ../../contact/register.php');
        exit;
    }

    public static function contactUpdateValidation(int $contactId): void
    {
        if ($_SESSION['error'] === []) {
            return;
        }

        header('Location: ../../contact/detail.php?id=' . $contactId);
        exit;
    }

    public function contactDataUpdateValidation(int $contactId, string $receiveTime, string $status, int $user, string $name, string $mail, string $title, string $content) :void
    {
        // recieved data (date > now, empty)
        if (empty(trim($receiveTime))) {
            $this->error[] = '受信日を選択してください。';
        }
        // name (empty)
        if (empty(trim($name))) {
            $this->error[] = '名前を入力してください。';
        }
        // mail (empty, not mail type)
        if (empty(trim($mail))) {
            $this->error[] = 'メールアドレスを入力してください。';
        }

        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($mail))) {
            $this->error[] = 'メールアドレスの形式が間違っています。';
        }
        // title (empty)
        if (empty(trim($title))) {
            $this->error[] = 'タイトルを入力してください。';
        }
        // content (empty)
        if (empty(trim($content))) {
            $this->error[] = '本文を入力してください。';
        }

        if (empty($this->error)) {
            return;
        }

        $_SESSION['error'] = $this->error;
    }

    public function contactLogUpdateValidation(array $contactLogs):void
    {
        foreach ($contactLogs as $contactLog) {
            if (empty(trim($contactLog))) {
                $this->error[] = '履歴を入力してください';
            }
        }

        if(empty($this->error)) {
            return;
        }

        $_SESSION['error'][] = $this->error[0];
    }

    public function userRegisterValidation(string $name, string $mail, string $password): void
    {
        // name (empty)
        if (empty(trim($name))) {
            $this->error[] = '名前を入力してください';
        }
        // mail (empty)
        if (empty(trim($mail))) {
            $this->error[] = 'メールアドレスを入力してください';
        }
        // mail (not mail type)
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($mail))) {
            $this->error[] = 'メールアドレスの形式が間違っています';
        }
        // password (6 < string < 20,)
        if (!preg_match("/^[a-zA-Z0-9!@]{6,20}$/", trim($password))) {
            $this->error[] = 'パスワードは半角英数字と記号(!,@)を使って6文字以上20文字以内で入力してください';
        }


        if (empty($this->error)) {
            return;
        }

        $_SESSION['error'] = $this->error;

        header('Location: /../../user/register.php');
        exit;
    }

    // user update validation
    public function userUpdateValidation(string $name, string $mail, int $user_id): void
    {
        // name (empty)
        if (empty(trim($name))) {
            $this->error[] = '名前を入力してください';
        }
        // mail (empty)
        if (empty(trim($mail))) {
            $this->error[] = 'メールアドレスを入力してください';
        }
        // mail (not mail type)
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($mail))) {
            $this->error[] = 'メールアドレスの形式が間違っています';
        }

        if (empty($this->error)) {
            return;
        }

        $_SESSION['error'] = $this->error;

        header('Location: /../../user/detail.php?user_id=' . $user_id);
        exit;
    }

    // user password validation
    public function passwordUpdateValidation(string $password, int $user_id): void
    {
        // password (6 < string < 20,)
        if (!preg_match("/^[a-zA-Z0-9!@]{6,20}$/", trim($password))) {
            $this->error[] = 'パスワードは半角英数字と記号(!,@)を使って6文字以上20文字以内で入力してください';
        }

        if (empty($this->error)) {
            return;
        }

        $_SESSION['error'] = $this->error;

        header('Location: /../../user/edit_password.php?user_id=' . $user_id);
        exit;
    }

    // login validation
    public function loginValidation(string $mail, string $pass): void
    {
        if (empty(trim($mail))) {
            $this->error[] = 'メールアドレスを入力してください';
        }
        // mail (not mail type)
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($mail))) {
            $this->error[] = 'メールアドレスの形式が間違っています';
        }
        // password (6 < string < 20,)
        if (!preg_match("/^[a-zA-Z0-9!@]{6,20}$/", trim($pass))) {
            $this->error[] = 'パスワードは半角英数字と記号(!,@)を使って6文字以上20文字以内で入力してください';
        }

        if (empty($this->error)) {
            return;
        }

        $_SESSION['error'] = $this->error;

        header('Location: /../../login.php');
        exit;
    }
}

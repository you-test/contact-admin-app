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

        header('Location: ../../contact/register.php');
        exit;
    }
}

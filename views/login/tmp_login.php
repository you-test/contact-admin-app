<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin</title>
    <link rel="stylesheet" href="../../html/styles.css">
</head>
<body id="login">
    <header>
        <h1>お問い合わせ管理</h1>
    </header>
    <div class="container">
        <h2>ログイン</h2>
        <form action="../../actions/login/action_login.php" method="post">
            <label for="mail">メールアドレス</label>
            <input type="mail" name="mail" placeholder="example@xxx.com">
            <label for="pass">パスワード</label>
            <input type="password" name="pass" id="pass">
            <button type="submit">ログイン</button>
        </form>
    </div>
</body>
</html>

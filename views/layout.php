<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin</title>
    <link rel="stylesheet" href="../html/styles.css">
</head>
<body>
    <header>
        <h1>お問い合わせ管理</h1>
        <ul class="header-nav">
            <li><a href="" class="btn btn_header">トップ</a></li>
            <li><a href="" class="btn btn_header">お問い合わせ管理</a></li>
            <li><a href="" class="btn btn_header">ユーザー管理</a></li>
        </ul>
        <div>
            <a href="" class="logout-btn">ログアウト</a>
            <p>佐藤佑介</p>
        </div>
    </header>
    <div class="container">
        <?php
        include $content;
        ?>
    </div>
</body>
</html>

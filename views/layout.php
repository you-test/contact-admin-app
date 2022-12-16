<?php
if (isset($_SESSION)) {
    print_r($_SESSION);
}
?>

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
            <li><a href="../top.php" class="btn btn_header">トップ</a></li>
            <li><a href="../contact" class="btn btn_header">お問い合わせ管理</a></li>
        <?php if (isset($_SESSION['user']['permission_id']) && $_SESSION['user']['permission_id'] === 1): ?>
            <li><a href="../user" class="btn btn_header">ユーザー管理</a></li>
        <?php endif; ?>
        </ul>
        <div>
            <a href="../actions/logout/logout.php" class="logout-btn">ログアウト</a>
            <p><?= $_SESSION['user']['name'] ?></p>
        </div>
    </header>
    <div class="container">
        <?php
        include $content;
        ?>
    </div>
</body>
</html>

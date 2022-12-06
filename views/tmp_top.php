<div class="top-wrapper">
    <h2>トップ</h2>
    <div class="top-content">
        <p>メニューを選択してください</p>
        <ul class="top-menu">
            <li><a href="../contact" class="btn btn_top">お問い合わせ管理</a></li>
        <?php if (isset($_SESSION['user']['permission_id']) && $_SESSION['user']['permission_id'] === 1): ?>
            <li><a href="../user" class="btn btn_top">ユーザー管理</a></li>
        <?php endif; ?>
        </ul>
    </div>
</div>

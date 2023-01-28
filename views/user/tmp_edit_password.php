<div class="contact-register-wrapper">
    <h2>パスワードの変更</h2>
    <div class="register-btn-block">
        <a href="../../user/detail.php?user_id=<?= $userId ?>" class="btn btn-back btn-back_psreset">< ユーザー詳細に戻る</a>
    </div>
    <!-- validation -->
    <?php if (isset($_SESSION['error'])): ?>
        <ul>
            <?php foreach ($error as $e): ?>
                <li class="error">※<?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
    <!-- end validation -->
    <form action="../../actions/user/action_update_password.php" method="post" id="register" class="user-form">
        <label for="password">新しいパスワードを入力</label>
        <input type="password" name="password" id="password">
        <input type="hidden" name="user_id" value="<?= $userId ?>">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        <button type="submit">パスワードを登録</button>
    </form>
</div>

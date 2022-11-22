<div class="contact-register-wrapper">
    <h2>パスワードの変更</h2>
    <div class="register-btn-block">
        <a href="../../user/detail.php?user_id=<?= $userId ?>" class="btn btn-back">< ユーザー詳細に戻る</a>
    </div>
    <form action="../../actions/user/action_update_password.php" method="post" id="register" class="user-form">
        <label for="password">新しいパスワードを入力</label>
        <input type="password" name="password" id="password">
        <input type="hidden" name="user_id" value="<?= $userId ?>">
        <button type="submit">パスワードを登録</button>
    </form>
</div>

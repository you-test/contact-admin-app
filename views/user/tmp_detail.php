<div class="contact-register-wrapper">
    <h2>ユーザー管理【詳細】</h2>
    <div class="register-btn-block">
        <a href="../../user" class="btn btn-back btn-back_detail">< 一覧に戻る</a>
        <div>
            <button class="btn submit-btn" form="register">登録</button>
            <form action="../../actions/user/action_delete.php" method="post">
                <input type="hidden" name="user_id" value="<?= $userData['user_id'] ?>">
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                <button>削除</button>
            </form>
        </div>
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
    <!-- /validation -->
    <form action="../../actions/user/action_update.php" method="post" id="register" class="user-form">
        <label for="no">ユーザーNO</label>
        <input type="text" id="no" name="no" value="<?= str_pad($userData['user_id'], 6, 0, STR_PAD_LEFT) ?>" disabled>
        <input type="hidden" name="user_id" value="<?= $userData['user_id'] ?>">
        <div>
            <div>
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" value="<?= $userData['name'] ?>">
            </div>
            <div>
                <label for="mail">メールアドレス</label>
                <input type="email" id="mail" name="mail" value="<?= $userData['mail'] ?>">
            </div>
        </div>
        <label for="permission">権限</label>
        <select name="permission" id="permission">
            <option value="1" <?php if ($userData['permission_id'] === 1) {echo 'selected';} ?>>管理者</option>
            <option value="2" <?php if ($userData['permission_id'] === 2) {echo 'selected';} ?>>編集者</option>
            <option value="3" <?php if ($userData['permission_id'] === 3) {echo 'selected';} ?>>閲覧者</option>
        </select>
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    </form>
    <button onclick="location.href='../../user/edit_password.php?user_id=<?= $userData['user_id'] ?>'">パスワードを変更する</button>
    <p>タスク状況</p>
    <table class="user-task-table">
        <thead>
            <tr>
                <td>未対応</td>
                <td>進行中</td>
                <td>完了</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $tasks['not_started'] ?></td>
                <td><?= $tasks['in_progress'] ?></td>
                <td><?= $tasks['done'] ?></td>
            </tr>
        </tbody>
    </table>
</div>

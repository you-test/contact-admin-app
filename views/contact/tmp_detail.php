<div class="contact-register-wrapper">
    <h2>お問い合わせ管理【詳細】</h2>
    <div class="register-btn-block">
        <a href="../../contact" class="btn btn-back btn-back_detail">< 一覧に戻る</a>
    <?php if (PermissionController::isAdminOrEditor($permissionId)): ?>
        <div>
            <button class="btn submit-btn" form="update">登録</button>
            <form action="../../actions/contact/action_delete.php" method="post">
                <input type="hidden" name="contact_id" value="<?= $contactData['contact_id'] ?>">
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                <button>削除</button>
            </form>
        </div>
    <?php endif; ?>
    </div>
    <!-- error -->
<?php if (isset($_SESSION['error'])): ?>
    <ul>
        <?php foreach ($error as $e): ?>
            <li class="error">※<?= $e ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
    <!-- end error -->
    <form action="../../actions/contact/action_update.php" method="post" id="update">
        <label for="id">お問い合わせNO</label>
        <input type="text" value="<?= str_pad($contactData['contact_id'], 6, 0, STR_PAD_LEFT) ?>" disabled class="contact-no">
        <input type="hidden" name="id" value="<?= $contactData['contact_id'] ?>">
        <div>
            <div>
                <label for="contact-date">受信日</label>
                <input type="datetime-local" name="receive_time" value="<?= $contactData['received_date'] ?>" <?= PermissionController::addDisabledOrNot($permissionId) ?>>
            </div>
            <div>
                <label for="status">対応ステータス</label>
                <select name="status" <?= PermissionController::addDisabledOrNot($permissionId) ?>>
                    <option value="未対応" <?= $contactData['status'] === '未対応' ? 'selected' : ''; ?>>未対応</option>
                    <option value="進行中" <?= $contactData['status'] === '進行中' ? 'selected' : ''; ?>>進行中</option>
                    <option value="完了" <?= $contactData['status'] === '完了' ? 'selected' : ''; ?>>完了</option>
                </select>
            </div>
            <div>
                <label for="user">担当者</label>
                <select name="user" <?= PermissionController::addDisabledOrNot($permissionId) ?>>
                    <?php foreach ($usersData as $userData): ?>
                        <option value="<?= $userData['user_id'] ?>" <?= $contactData['user_id'] === $userData['user_id'] ? 'selected' : ''; ?>><?= $userData['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div>
            <div>
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" value="<?= $contactData['name'] ?>" <?= PermissionController::addDisabledOrNot($permissionId) ?>>
            </div>
            <div>
                <label for="mail">メールアドレス</label>
                <input type="email" id="mail" name="mail" value="<?= $contactData['mail'] ?>" <?= PermissionController::addDisabledOrNot($permissionId) ?>>
            </div>
        </div>
        <label for="title">タイトル</label>
        <textarea name="title" cols="30" rows="10" <?= PermissionController::addDisabledOrNot($permissionId) ?>><?= $contactData['title'] ?></textarea>
        <label for="content">受信本文</label>
        <textarea name="content" cols="30" rows="10" <?= PermissionController::addDisabledOrNot($permissionId) ?>><?= $contactData['content'] ?></textarea>
    <?php if (PermissionController::isAdminOrEditor($permissionId)): ?>
        <label for="log">履歴の追加</label>
        <textarea name="log_add" id="log" cols="30" rows="10"></textarea>
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <?php endif; ?>
    </form>
    <form action="../../actions/contact/action_log_delete.php" method="POST" id="log">
        <?php foreach ($contactLogs as $contactLog): ?>
            <label for="log_exist">作成：<?= $contactLog['created_at'] ?>&nbsp;更新：<?= $contactLog['updated_at'] ?></label>
            <textarea name="logs_exist[<?= $contactLog['id'] ?>]" id="log_exist" form="update" cols="30" rows="10" <?= PermissionController::addDisabledOrNot($permissionId) ?>><?= $contactLog['content'] ?></textarea>
            <button <?= PermissionController::addDisabledOrNot($permissionId) ?>>削除</button>
            <input type="hidden" name="log_id" value="<?= $contactLog['id'] ?>">
            <input type="hidden" name="contact_id" value="<?= $contactData['contact_id'] ?>">
        <?php endforeach; ?>
    </form>
</div>

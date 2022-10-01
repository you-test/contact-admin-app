<div class="contact-register-wrapper">
    <h2>お問い合わせ管理【新規登録】</h2>
    <div class="register-btn-block">
        <a href="../../contact" class="btn btn-back">< 一覧に戻る</a>
        <div>
            <button class="btn submit-btn" form="update">登録</button>
            <form action="../../actions/contact/action_delete.php">
                <input type="hidden" name="contact_id">
                <button>削除</button>
            </form>
        </div>
    </div>
    <form action="../../actions/contact/action_update.php" method="post" id="update">
        <label for="id">お問い合わせNO</label>
        <input type="text" value="<?= str_pad($contactData['contact_id'], 6, 0, STR_PAD_LEFT) ?>" disabled class="contact-no">
        <input type="hidden" name="id" value="<?= $contactData['contact_id'] ?>">
        <div>
            <div>
                <label for="contact-date">受信日</label>
                <input type="datetime-local" name="receive_time" value="<?= $contactData['received_date'] ?>">
            </div>
            <div>
                <label for="status">対応ステータス</label>
                <select name="status">
                    <option value="未対応" <?= $contactData['status'] === '未対応' ? 'selected' : ''; ?>>未対応</option>
                    <option value="進行中" <?= $contactData['status'] === '進行中' ? 'selected' : ''; ?>>進行中</option>
                    <option value="完了" <?= $contactData['status'] === '完了' ? 'selected' : ''; ?>>完了</option>
                </select>
            </div>
            <div>
                <label for="user">担当者</label>
                <select name="user">
                    <option value="1" <?= $contactData['user_id'] === 1 ? 'selected' : ''; ?>>佐藤佑介</option>
                    <option value="2" <?= $contactData['user_id'] === 2 ? 'selected' : ''; ?>>佐藤次郎</option>
                </select>
            </div>
        </div>
        <div>
            <div>
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" value="<?= $contactData['name'] ?>">
            </div>
            <div>
                <label for="mail">メールアドレス</label>
                <input type="email" id="mail" name="mail" value="<?= $contactData['mail'] ?>">
            </div>
        </div>
        <label for="title">タイトル</label>
        <textarea name="title" cols="30" rows="10"><?= $contactData['title'] ?></textarea>
        <label for="content">受信本文</label>
        <textarea name="content" cols="30" rows="10"><?= $contactData['content'] ?></textarea>
        <label for="log">履歴の追加</label>
        <textarea name="log_add" id="log" cols="30" rows="10"></textarea>
        <?php foreach ($contactLogs as $contactLog): ?>
            <label for="log_exist">作成：<?= $contactLog['created_at'] ?>&nbsp;更新：<?= $contactLog['updated_at'] ?></label>
            <textarea name="logs_exist[<?= $contactLog['id'] ?>]" id="log_exist" cols="30" rows="10"><?= $contactLog['content'] ?></textarea>
        <?php endforeach; ?>
    </form>
</div>

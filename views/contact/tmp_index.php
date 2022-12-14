<div class="contact-wrapper">
    <h2>お問い合わせ管理【一覧】</h2>
<?php if (isset($_SESSION['user']['permission_id']) && PermissionController::isAdminOrEditor($_SESSION['user']['permission_id'])): ?>
    <a href="../../contact/register.php" class="btn btn_contact">新規登録</a>
<?php endif; ?>
    <form action="./" method="post">
        <table class="sort_contact">
            <tr>
                <td>期間</td>
                <td><input type="datetime-local" name="start"></td>
                <td><input type="datetime-local" name="end"></td>
            </tr>
            <tr>
                <td>並び順</td>
                <td>
                    <select name="sort_type">
                        <option value="">ソートタイプを選択</option>
                        <option value="contact_id">NO</option>
                        <option value="received_date">受信日</option>
                        <option value="status">ステータス</option>
                        <option value="updated_at">更新日</option>
                    </select>
                </td>
                <td>
                    <select name="asc_desc">
                        <option value="">降順/昇順を選択</option>
                        <option value="desc">降順</option>
                        <option value="asc">昇順</option>
                    </select>
                </td>
            </tr>
        </table>
        <button class="btn btn_contact border-none">検索</button>
    </form>
    <table class="contact-list">
        <thead>
            <tr>
                <th>お問い合わせNO</th>
                <th>受信日</th>
                <th>対応ステータス</th>
                <th>タイトル</th>
                <th>お名前</th>
                <th>メールアドレス</th>
                <th>更新日</th>
                <th>担当ユーザー</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactListData as $contactData):
                $userData = $userDataInstance->getUserData($contactData['user_id']);
            ?>
                <tr <?= ContactStatusController::statusJudge($contactData['status']) ?>>
                    <td><a href="../../contact/detail.php?id=<?= $contactData['contact_id'] ?>"><?= str_pad($contactData['contact_id'], 6, 0, STR_PAD_LEFT) ?></a></td>
                    <td><?= $contactData['received_date'] ?></td>
                    <td><?= $contactData['status'] ?></td>
                    <td><?= $contactData['title'] ?></td>
                    <td><?= $contactData['name'] ?></td>
                    <td><?= $contactData['mail'] ?></td>
                    <td><?= $contactData['updated_at'] ?></td>
                    <td><?= $userData['name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
